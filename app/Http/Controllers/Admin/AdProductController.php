<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class AdProductController extends Controller
{
    // Fetches and displays all products on the index page
    public function index()
    {

        $products = Product::all();

        // 2. Return the blade file and pass the $products variable to it
        // Note: Use the correct folder path like 'admin.products'
        return view('admin.products', compact('products'));
    }


    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        // Validate base fields first
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'nullable|string',
        ]);

        // Support either an uploaded file (image_file) or an image URL (image_url)
        if ($request->hasFile('image_file')) {
            $request->validate(['image_file' => 'image|mimes:jpeg,png,jpg|max:2048']);
            $imagePath = $request->file('image_file')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        } elseif ($request->filled('image_url') && filter_var($request->input('image_url'), FILTER_VALIDATE_URL)) {
            $validatedData['image'] = $request->input('image_url');
        } else {
            return back()->withErrors(['image' => 'Please upload an image file or provide a valid image URL.'])->withInput();
        }

        // Create product after image is handled
        $newProduct = Product::create($validatedData);

        return redirect()->route('product')->with('success', 'Product added successfully!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('category_name')->get();
        return view('admin.editProduct', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'nullable|string',
        ]);

        // Handle image update (file or url)
        if ($request->hasFile('image_file')) {
            $request->validate(['image_file' => 'image|mimes:jpeg,png,jpg|max:2048']);
            // delete old stored file when applicable
            if ($product->image && ! filter_var($product->image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image_file')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        } elseif ($request->filled('image_url') && filter_var($request->input('image_url'), FILTER_VALIDATE_URL)) {
            // if previous was local, optionally remove it
            if ($product->image && ! filter_var($product->image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($product->image);
            }
            $validatedData['image'] = $request->input('image_url');
        }

        $product->update($validatedData);

        return redirect()->route('product')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // If image is stored locally, delete the file
        if ($product->image && ! filter_var($product->image, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('product')->with('success', 'Product deleted successfully!');
    }

}
