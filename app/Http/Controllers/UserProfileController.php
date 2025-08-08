<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // To get the logged-in user

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('profile.show', compact('user')); // Pass the user data to the view
    }
}