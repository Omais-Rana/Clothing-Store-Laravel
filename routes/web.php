<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Banner;
use TCG\Voyager\Facades\Voyager;

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', function () {
    $banners = Banner::orderBy('created_at', 'desc')->get();
    $featured = Product::where('featured', true)->orderBy('created_at', 'desc')->get(); //latest trending
    $special = Product::where('special', true)->orderBy('created_at', 'desc')->get(); //latest special
    return view('home', compact('featured', 'special', 'banners'));
});

// Show New Arrivals 
Route::get('/new-arrivals', [ProductController::class, 'newProducts'])->name('products.new');

// Show products by category
Route::get('/category/{category}', [ProductController::class, 'showByCategory'])->name('category.by_category');

// Show all products
Route::get('/all-items', [ProductController::class, 'allProducts'])->name('products.all');

// Show single product
Route::get('/products/{slug}', [ProductController::class, 'shopSingle'])->name('shop.single');

// Route::get('/about', function () {
//     return view('about');
// });

// Contact us routes
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');


// //Carting routes
// Route::get('cart', [CartController::class, 'cart'])->name('cart');
// Route::get('add-cart/{productId}', [CartController::class, 'addCart'])->name('add.cart');

// Route::get('add-quantity/{productId}', [CartController::class, 'addQuantity'])->name('add.quantity');

// Route::get('decrease-quantity/{productId}', [CartController::class, 'decreaseQuantity'])->name('decrease.quantity');

// Route::get('remove-item/{productId}', [CartController::class, 'removeItem'])->name('remove.item');
