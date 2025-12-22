<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
     * Show the form for creating a new product.
     * (This method would likely fetch categories for a dropdown field.)
     */
    public function create()
    {
        // Fetch categories to populate the dropdown for the form
        $categories = \App\Models\Category::all();
        return view('admin.products.create', compact('categories'));
    }


    // Handles the form submission to save a new product
    public function store(Request $request)
    {

        dd($request->all());

        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|decimal|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required|string',
            'description' => 'nullable|string',
        ]);

        // 2. Handle Image Upload
        if ($request->hasFile('image')) {
            // Saves to storage/app/public/products
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        Product::create($validatedData);

        return redirect()->route('product')->with('success', 'Product added successfully!');
    }
}
