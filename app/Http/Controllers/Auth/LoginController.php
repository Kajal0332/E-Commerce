<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Important for authentication

class LoginController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // 1. Validate the incoming request data
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'], // Use 'email' for Laravel's default Auth
            'password' => ['required', 'string'],
        ]);

        // If you want to allow login with 'username' instead of 'email', you'd do:
        // $credentials = $request->validate([
        //     'username' => ['required', 'string'],
        //     'password' => ['required', 'string'],
        // ]);
        // And then below, you might need to find the user by username first
        // Or configure your User model to use 'username' as Auth identifier
        // public function username() { return 'username'; } in LoginController
        // For simplicity, stick to 'email' if your users table has it.

        // 2. Attempt to log the user in
        // Auth::attempt() returns true on success, false on failure
        if (Auth::attempt($credentials)) {
            // Regeneration of the session ID is important for security (session fixation)
            $request->session()->regenerate();

            // Redirect to the intended page or home route
            return redirect()->intended(route('home'))->with('success', 'Logged in successfully!');
        }

        // 3. If authentication fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email'); // Keep the email input filled
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the currently authenticated user

        $request->session()->invalidate(); // Invalidates the current session
        $request->session()->regenerateToken(); // Regenerates the CSRF token

        return redirect('/login')->with('success', 'You have been logged out.'); // Redirect to login page
    }
}