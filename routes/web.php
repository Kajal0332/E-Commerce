<?php
// Existing routes...

use App\Http\Controllers\ContactController; // Import your ContactController
use App\Http\Controllers\Admin\adminDeshboardController; // Import your controller
use App\Http\Controllers\Admin\AdProductController; // Import your controller
use App\Http\Controllers\Auth\RegisterController; // Import your controller
use App\Http\Controllers\Auth\LoginController; // Import your LoginController
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProfileController; // Create this controller
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 


// Define admin dashboard

/**
 * This route handles the display of the home page.
*
* @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
*
* @throws \Illuminate\View\ViewException
*/
// =================for only admin ===========================

// admin deshboard page controller 

// product add from admin pannel 

// Route to handle form submission and save the new product
// Route::post('/addProduct', [AdProductController::class, 'store'])->name('addProduct.store');






// Route::get('/', action: function () {
//     return view('home'); // This will try to load resources/views/home.blade.php
// })->name('index');

// Route::get('/home/product', [HomeController::class, 'create'])->name('home.product');



// Define the 'about' route
Route::get('/about', function () {
    return view('about'); // This will try to load resources/views/home.blade.php
})->name('about');


// Define the 'contact' route
Route::get('/contact', function () {
    return view('contact'); // This will try to load resources/views/home.blade.php
})->name('contact');


// Add this to your routes/web.php of product detail page view on the brower
Route::get('productDetail/{id}', [ProductController::class, 'productDetail'])->name('productDetail');


// Add this to your routes/web.php of Search result view on the brower
Route::get('searchPage', [ProductController::class, 'search'])->name('searchPage');

// Add this to your routes/web.php of Search result view on the brower
Route::get('add_to_cart', [ProductController::class, 'cartPage']);
Route::post('add_to_cart', [ProductController::class, 'cartPage'])->name('cartPage');



// Route to show the signup form (you already have this or similar)
Route::get('/signup', function () {
        return view('auth.signup');
    })->name('signup'); // Give it a name if you link to it via route('signup')
    
    // Route to handle the form submission (POST request)
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    
    // logout 
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Auth::routes();
    
    Route::middleware(['auth', AdminMiddleware::class])->group(function () {
        Route::get('/adminDeshboard', [adminDeshboardController::class, 'index'])->name('adminDeshboard');
        Route::get('/adminCategory', [adminDeshboardController::class, 'category'])->name('adminCategory');
        // To show the form page
        Route::get('/product', [AdProductController::class, 'index'])->name('product');
        Route::post('/adminProduct', [AdProductController::class, 'store'])->name('addProduct');
// Route::get('/admin/add-product', [ProductController::class, 'create']); 

// To process the data when you hit 'Submit'
// Route::post('/admin/add-product', [ProductController::class, 'store'])->name('addProduct');
});

// Route for the user profile page (often protected by middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
    // Add more profile-related routes here, e.g., for editing:
        // Rou te::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    // 
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
});

// routes/web.php


// Route to display the contact form (if you don't have it already)
Route::get('/contact', function () {
    return view('contact');
})->name('Z');

// Route to handle the contact form submission
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// wishlist page controller 
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');


