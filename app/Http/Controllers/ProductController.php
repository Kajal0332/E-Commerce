<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Colors\Rgb\Channels\Red;

class ProductController extends Controller
{
    public function product()
    {
        $products = Product::all();

        $wishlistIds = [];
        $cartIds = [];
        if (Auth::check()) {
            $wishlistIds = Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray();
            $cartIds = Cart::where('user_id', Auth::id())->pluck('product_id')->toArray();
        }

        return view('home', compact('products', 'wishlistIds', 'cartIds'));
    }
    public function productDetail($id)
    {
        $data = Product::find($id);

        $wishlistIds = [];
        $cartIds = [];
        if (Auth::check()) {
            $wishlistIds = Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray();
            $cartIds = Cart::where('user_id', Auth::id())->pluck('product_id')->toArray();
        }

        return view('productDetailPages', ['product' => $data, 'wishlistIds' => $wishlistIds, 'cartIds' => $cartIds]);
    }
    public function search(Request $req)
    {
        $data = Product::where('product_name', 'like', '%' . $req->input('query') . '%')->get();
        return view('searchPage', ['product' => $data]);
    }
    public function cartPage(Request $req)
    {
        $req->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        if (! Auth::check()) {
            if ($req->ajax() || $req->wantsJson()) {
                return response()->json(['message' => 'Unauthenticated'], 401);
            }
            return redirect()->route('login');
        }

        $userId = Auth::id();
        $productId = $req->input('product_id');

        $existing = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
        if ($existing) {
            // increment quantity
            $existing->quantity = $existing->quantity + 1;
            $existing->save();

            if ($req->ajax() || $req->wantsJson()) {
                $cartTotal = Cart::where('user_id', $userId)->sum('quantity');
                return response()->json(['status' => 'updated', 'quantity' => $existing->quantity, 'cart_total' => $cartTotal], 200);
            }

            return redirect()->back()->with('success', 'Product quantity updated in cart');
        }

        Cart::create(['user_id' => $userId, 'product_id' => $productId, 'quantity' => 1]);

        if ($req->ajax() || $req->wantsJson()) {
            $cartTotal = Cart::where('user_id', $userId)->sum('quantity');
            return response()->json(['status' => 'added', 'quantity' => 1, 'cart_total' => $cartTotal], 201);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }
    public function cartlist()
    {
        $userId = Auth::id();
        $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select('products.*', 'carts.id as cart_id', 'carts.quantity')
            ->get();

        // compute subtotal
        $subtotal = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->selectRaw('SUM(products.price * carts.quantity) as subtotal')
            ->value('subtotal') ?? 0;

        return view('cartPage', compact('cartItems', 'subtotal'));
    }

    public function updateCartQuantity(Request $req)
    {
        $req->validate([
            'cart_id' => 'required|integer|exists:carts,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if (! Auth::check()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $cart = Cart::where('id', $req->input('cart_id'))->where('user_id', Auth::id())->first();
        if (! $cart) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $cart->quantity = $req->input('quantity');
        $cart->save();

        $product = Product::find($cart->product_id);
        $lineTotal = $product->price * $cart->quantity;

        // recompute subtotal and cart total
        $subtotal = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', Auth::id())
            ->selectRaw('SUM(products.price * carts.quantity) as subtotal')
            ->value('subtotal') ?? 0;

        $cartTotal = Cart::where('user_id', Auth::id())->sum('quantity');

        return response()->json(['status' => 'updated', 'quantity' => $cart->quantity, 'line_total' => $lineTotal, 'subtotal' => $subtotal, 'cart_total' => $cartTotal], 200);
    }

    public function removeFromCart(Request $req)
    {
        $req->validate([
            'cart_id' => 'required|integer|exists:carts,id'
        ]);

        if (! Auth::check()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $cart = Cart::where('id', $req->input('cart_id'))->where('user_id', Auth::id())->first();
        if (! $cart) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $cart->delete();

        // recompute subtotal and cart total
        $subtotal = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', Auth::id())
            ->selectRaw('SUM(products.price * carts.quantity) as subtotal')
            ->value('subtotal') ?? 0;

        $cartTotal = Cart::where('user_id', Auth::id())->sum('quantity');

        return response()->json(['status' => 'removed', 'subtotal' => $subtotal, 'cart_total' => $cartTotal], 200);
    }
    public function wishlistPage(Request $req)
    {
        $req->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        if (! Auth::check()) {
            if ($req->ajax() || $req->wantsJson()) {
                return response()->json(['message' => 'Unauthenticated'], 401);
            }
            return redirect()->route('login');
        }

        $userId = Auth::id();
        $productId = $req->input('product_id');

        $existing = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();
        if ($existing) {
            $existing->delete();
            if ($req->ajax() || $req->wantsJson()) {
                return response()->json(['status' => 'removed'], 200);
            }
            return redirect()->back()->with('info', 'Product removed from wishlist');
        }

        Wishlist::create(['user_id' => $userId, 'product_id' => $productId]);
        if ($req->ajax() || $req->wantsJson()) {
            return response()->json(['status' => 'added'], 201);
        }

        return redirect()->back()->with('success', 'Product added to Wishlist!');
    }
    public function wishlist()
    {
        $userId = Auth::id();
        $wishlistItems = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->where('wishlists.user_id', $userId)
            ->select('products.*', 'wishlists.id as wishlist_id')
            ->get();
        return view('wishlist', compact('wishlistItems'));
    }
    public function categoriesPage()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(12);

        $wishlistIds = [];
        $cartIds = [];
        if (Auth::check()) {
            $wishlistIds = Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray();
            $cartIds = Cart::where('user_id', Auth::id())->pluck('product_id')->toArray();
        }

        return view('categories', compact('categories', 'wishlistIds', 'cartIds'));
    }
    public function categoryShow($id)
    {
        $category = Category::findOrFail($id);

        // Products store category name in `category` column, so match by name
        $products = Product::where('category', $category->category_name)
            ->orderBy('created_at', 'DESC')
            ->paginate(12);

        $categories = Category::orderBy('created_at', 'DESC')->paginate(12);

        $wishlistIds = [];
        $cartIds = [];
        if (Auth::check()) {
            $wishlistIds = Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray();
            $cartIds = Cart::where('user_id', Auth::id())->pluck('product_id')->toArray();
        }

        return view('categories', compact('categories', 'category', 'products', 'wishlistIds', 'cartIds'));
    }

    public function toggleCategories()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(12);
        return view('/categories', compact('categories'));
    }

    public function checkoutPage()
    {
        $userId = Auth::id();
        $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->select('products.*', 'carts.id as cart_id', 'carts.quantity')
            ->get();

        // compute subtotal
        $subtotal = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->selectRaw('SUM(products.price * carts.quantity) as subtotal')
            ->value('subtotal') ?? 0;

        return view('checkout', compact('cartItems', 'subtotal'));
    }

    // public function orderNow(Request $req)
    // {
    //    $req->validate([
    //         'product_id' => 'required|integer|exists:products,id',
    //         'username' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'phone' => 'required|string|max:20',
    //         'streetAddress' => 'required|string|max:500',
    //         'city' => 'required|string|max:100',
    //         'apartment' => 'nullable|string|max:100',
    //     ]);

    //     if (! Auth::check()) {
    //         if ($req->ajax() || $req->wantsJson()) {
    //             return response()->json(['message' => 'Unauthenticated'], 401);
    //         }
    //         return redirect()->route('login');
    //     }

    //     $userId = Auth::id();

    //             $address = Checkout::create([
    //                 'user_id' => $userId,
    //                 'product_id' => $req->input('product_id'),
    //                 'username' => $req->input('username'),
    //                 'email' => $req->input('email'),
    //                 'phone' => $req->input('phone'),
    //                 'streetAddress' => $req->input('streetAddress'),
    //                 'city' => $req->input('city'),
    //                 'apartment' => $req->input('apartment'),
    //                 'total_amount' => $req->input('total_amount'),
    //                 'status' => 'pending'
    //             ]);

    //             $address->save();

    //     if ($req->ajax() || $req->wantsJson()) {
    //         return response()->json(['status' => 'added'], 201);
    //     }
    // }

    public function orderNow (Request $request) {
        $user = Auth::user()->id;
        $address = Address::where('user_id', $user)->where('is_default', true)->first();

        if (!$address) {
            $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'username' => 'required|string|max:255',
                'streetAddress' => 'required|string|max:500',
                'apartment' => 'nullable|string|max:100',
                'city' => 'required|string|max:100',
                'phone' => 'required|string|max:20',
                'country' => 'required|string|max:100',
                'email' => 'required|email|max:255',
                'is_default' => 'boolean',
            ]);

            $address = new Address();
            $address->user_id = $user;
            $address->name = $request->username;
            $address->address = $request->streetAddress;
            $address->landmark = $request->apartment;
            $address->city = $request->city;;
            $address->phone = $request->phone;
            $address->country = 'India';
            $address->zip = $request->email;
            $address->is_default = true;
            $address->save();
        }

        $order = new Order();
        $order->user_id = $user;
        $order->subtotal = Session::get('checkout')['subtotal'] ?? 0;
        $order->total = Session::get('checkout')['total'] ?? 0;
        $order->name = $address->name;
        $order->phone = $address->phone;
        $order->locality = $address->locality;
        $order->address = $address->address;
        $order->city = $address->city;
        $order->state = $address->state;
        $order->country = $address->country;
        $order->landmark = $address->landmark;
        $order->zip = $address->zip;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $item->id;
            $orderItem->product_id = $item->id;
            $orderItem->quantity = $item->qty;
            $orderItem->price = $item->qty * $item->price;
            $orderItem->save();
        }

        if ($request->payment_mode == 'online' || $request->payment_mode == 'card') {
            $transaction = new Checkout();
            $transaction->user_id = $user;
            $transaction->order_id = $item->id;
            $transaction->amount = $item->price;
            $transaction->transaction_mode = $request->transaction_mode;
            $transaction->transaction_status = 'success';
            $transaction->save();
        }
        elseif ($request->payment_mode == 'COD') {
            $transaction = new Checkout();
            $transaction->user_id = $user;
            $transaction->order_id = $item->id;
            $transaction->amount = $item->price;
            $transaction->transaction_mode = $request->transaction_mode;
            $transaction->transaction_status = 'pending';
            $transaction->save();
        }

        Cart::instance('cart')->destroy();
        Session::forget('checkout');
        return view('order-detail', compact('order'))->with('status', 'Order placed successfully!');
    }

    public function order_detail_page(){
        return view('order-detail');
    }

}
