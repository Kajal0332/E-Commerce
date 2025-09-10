<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdProductController extends Controller
{
    public function index()
    {
        // return the product view page from resources/views/admin/product.blade.php
        return view('admin.products');
    }
    
}
