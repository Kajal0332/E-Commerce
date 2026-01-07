<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Symfony\Component\CssSelector\Node\FunctionNode;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Wishlist;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Auth;

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
        return view('checkoutPage');
    }

    
}
