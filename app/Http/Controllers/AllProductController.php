<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AllProductController extends Controller
{
    /**
     * Display a listing of all products (paginated).
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        return view('AllProducts', compact('products'));
    }
}
