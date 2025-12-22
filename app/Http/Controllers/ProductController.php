<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function product () {
        $products = Product::all();
        return view('home', compact('products'));

    }
    Public function productDetail($id){
        $data = Product::find($id);
        return view('productDetailPages',['product'=>$data]);
    }
    Public function search(Request $req){
        $data= Product::where('product_name', 'like', '%'.$req->input('query'). '%')->get();
        return view('searchPage',['product'=>$data]);

    }
}
