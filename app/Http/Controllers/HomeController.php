<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Database\Seeders\productSeeder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return Product::all();
        $product = Product::all();
        return view('home', compact('product'));
        // return view('home');
    }


    // public function show($id)
    // {
    //     // Find the product by ID or show 404 if not found
    //     $product = Product::findOrFail($id);

    //     // Return a new view (you will need to create this file)
    //     return view('product-detail', compact('product'));
    // }


}
