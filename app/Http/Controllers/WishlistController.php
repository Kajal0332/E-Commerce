<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('wishlist');
    }

    
}