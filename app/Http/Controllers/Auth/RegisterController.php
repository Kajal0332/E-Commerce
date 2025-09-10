<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Make sure you have a User model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming request data
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // 'unique:users' ensures email is not already taken
            'phoneNumber' => ['required', 'string', 'max:10'], // Adjust max length as needed
            'password' => ['required', 'string', 'min:8', 'confirmed'], // 'confirmed' automatically checks for password_confirmation
        ]);

        // 🔍 Debugging here
        // dd($request->all());

        // 2. Hash the password and create the user
        $user = User::create([
            'name' => $request->fullName, // Assuming your users table has a 'name' column
            'email' => $request->email,
            'phone_number' => $request->phoneNumber, // Assuming your users table has a 'phone_number' column
            'password' => Hash::make($request->password), // Hash the password!
        ]);

        // 3. Log the user in (optional, but common after registration)
        // Auth::login($user);

        // 4. Redirect the user to a dashboard or home page
        return redirect()->route('login')->with('success', 'Account created successfully!');
        // Or redirect to a specific dashboard route: return redirect('/dashboard');
    }
}
