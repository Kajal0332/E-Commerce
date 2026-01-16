<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Encoders\JpegEncoder;
use App\Models\Order;
class adminDeshboardController extends Controller
{
    //
    /**
     * Display the admin's deshboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.deshboard');
    }

    public function category () {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.category', compact('categories'));
    }

    
    public function storeCategory(Request $request) {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_extension = $image->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;
            $this->GenerateCategoryThumbailsImage($image, $file_name);
            $category->image = $file_name;
        }
        $category->save();
        return redirect()->back()->with('success', 'Category added successfully!');
    }
    public function editCategory ($id) {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        $category = Category::findOrFail($id);
        if (! $category) {
            return redirect()->route('admin.category')->with('error', 'Category not found.');
        }
        return view('admin.category', compact('categories', 'category'));
    }

    public function updateCategory (Request $request) {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'slug' => 'required|unique:categories,slug,'. $request->id,
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->slug = str::slug($request->category_name);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('images/categories/' . $category->image))) {
                File::delete(public_path('images/categories/' . $category->image));
            }
            $image = $request->file('image');
            $file_extension = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extension;
            $this->GenerateCategoryThumbailsImage($image, $file_name);
            $category->image = $file_name;
        }
        $category->save();
        return redirect()->route('adminCategory')->with('status', 'Category has been updated successfully!');
    }
    public function deleteCategory ($id) {
        $category = Category::find($id);
        if (! $category) {
            return redirect()->route('adminCategory')->with('error', 'Category not found.');
        }
        if ($category->image && File::exists(public_path('images/categories/' . $category->image))) {
            File::delete(public_path('images/categories/' . $category->image));
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
    public function GenerateCategoryThumbailsImage ($image, $imageName) {
        $destinationPath = public_path('/images/categories');
        if (! file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        $img = Image::read($image->getRealPath());
        $img->cover(124, 124);
        $img->encode(new JpegEncoder(quality: 90));
        $img->save($destinationPath . '/' . $imageName);
    }
    public function order_list()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(15);
        return view('admin/orderPage', compact('orders'));
    }
}