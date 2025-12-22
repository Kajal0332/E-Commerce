<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

// use Illuminate\Http\Request;

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
        $cattegories = Category::orderBy('id', 'DESC')->pagination(10);
        return view('admin.category', compact('categories'));
    }

    public function addCategory() {
        
    }

    
}