<?php
// Existing routes...

use App\Http\Controllers\Auth\RegisterController; // Import your controller
use App\Http\Controllers\Auth\LoginController; // Import your LoginController
use App\Http\Controllers\UserProfileController; // Create this controller
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

// Define admin dashboard
Route::get('/admin/products', function () {
    return view('admin.products');
});

// Define the 'home' route
Route::get('/', function () {
    return view('home'); // This will try to load resources/views/home.blade.php
})->name('home');

// Define the 'about' route
Route::get('/about', function () {
    return view('about'); // This will try to load resources/views/home.blade.php
})->name('about');

// Define the 'home' route
Route::get('/contact', function () {
    return view('contact'); // This will try to load resources/views/home.blade.php
})->name('contact');

// Route to show the signup form (you already have this or similar)
Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup'); // Give it a name if you link to it via route('signup')

// Route to handle the form submission (POST request)
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');



// Route to display the login form
Route::get('/login', function () {
    return view('auth.login'); // Assuming your login form is in resources/views/auth/login.blade.php
})->name('login'); // This is the route name your login button from previous steps points to

// Route to handle login form submission
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// logout 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route for the user profile page (often protected by middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
    // Add more profile-related routes here, e.g., for editing:
    // Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    // Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
});

// routes/web.php

use App\Http\Controllers\ContactController; // Import your ContactController

// ... (your existing routes like /contact for GET, /home, /login, /signup, etc.)

// Route to display the contact form (if you don't have it already)
Route::get('/contact', function () {
    return view('contact');
})->name('Z');

// Route to handle the contact form submission
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// wishlist page controller 
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');