<?php
// Existing routes...

use App\Http\Controllers\ContactController; // Import your ContactController
use App\Http\Controllers\Admin\adminDeshboardController; // Import your controller
use App\Http\Controllers\Admin\AdProductController; // Import your controller
use App\Http\Controllers\Auth\RegisterController; // Import your controller
use App\Http\Controllers\Auth\LoginController; // Import your LoginController
use App\Http\Controllers\AllProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProfileController; // Create this controller
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


Route::get('/', action: function () {
    return view('home'); // This will try to load resources/views/home.blade.php
})->name('home');


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




// Route to show the signup form (you already have this or similar)
Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('signup'); // Give it a name if you link to it via route('signup')

// Route to handle the form submission (POST request)
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// logout 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

// =================for only admin ===========================
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/adminDeshboard', [adminDeshboardController::class, 'index'])->name('adminDeshboard');
    Route::get('/adminCategory', [adminDeshboardController::class, 'category'])->name('adminCategory');
    Route::get('/adminAddCategory', [adminDeshboardController::class, 'addCategory'])->name('adminAddCategory');
    Route::post('/adminStoreCategory', [adminDeshboardController::class, 'storeCategory'])->name('addCategory.store');
    Route::get('/adminStoreCategory/edit/{id}', [adminDeshboardController::class, 'editCategory'])->name('editCategory');
    Route::put('/adminStoreCateory/update', [adminDeshboardController::class, 'updateCategory'])->name('updateCategory');
    Route::delete('/adminStoreCategory/delete/{id}', [adminDeshboardController::class, 'deleteCategory'])->name('deleteCategory');
    // To show the form page    
    Route::get('/product', [AdProductController::class, 'index'])->name('product');
    Route::post('/adminProduct', [AdProductController::class, 'store'])->name('product.store');
    Route::get('/adminProduct/edit/{id}', [AdProductController::class, 'edit'])->name('product.edit');
    Route::put('/adminProduct/{id}', [AdProductController::class, 'update'])->name('product.update');
    Route::delete('/adminProduct/{id}', [AdProductController::class, 'destroy'])->name('product.destroy'); 
    // All products listing
    Route::get('/all-products', [AllProductController::class, 'index'])->name('allProducts');
    Route::get('/admin/orders', [adminDeshboardController::class, 'order_list'])->name('allOrders');
    Route::post('/checkout-cart', [ProductController::class, 'orderNow'])->name('orderNow');  

});

// Route for the user profile page (often protected by middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
    // Add more profile-related routes here, e.g., for editing:
        // Rou te::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
        // 
        Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
        
        // Add this to your routes/web.php of Search result view on the brower
        Route::post('add_to_cart', [ProductController::class, 'cartPage'])->name('cartPage');
        // Route::post('add_to_cart', [ProductController::class, 'cartPage'])->name('cartPage');
        Route::get('/cartlist', [ProductController::class, 'cartlist'])->name('cartlist');

        // cart management (ajax)
        Route::post('/cart/update', [ProductController::class, 'updateCartQuantity'])->name('cart.update');
        Route::post('/cart/remove', [ProductController::class, 'removeFromCart'])->name('cart.remove');
        
        // wishlist page controller 
        Route::get('/wishlist', [ProductController::class, 'wishlist'])->name('wishlist');
        Route::post('/wish_list', [ProductController::class, 'wishlistPage'])->name('wish_list');
        
        Route::get('/categories', [ProductController::class, 'categoriesPage'])->name('categories');
        Route::post('/cate_gories', [ProductController::class, 'toggleCategories'])->name('cate_gories');
        Route::get('/checkout', [ProductController::class, 'checkoutPage'])->name('checkout');
        Route::post('/order-detail', [ProductController::class, 'order_detail_page'])->name('order.detail.page');
    });

// routes/web.php


// Route to display the contact form (if you don't have it already)
Route::get('/contact', function () {
    return view('contact');
})->name('Z');

// Route to handle the contact form submission
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');



