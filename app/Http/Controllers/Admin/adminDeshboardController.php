<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.dashboard');
    }
}