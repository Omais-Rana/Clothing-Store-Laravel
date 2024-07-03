<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Banner;
use App\Brand;
use TCG\Voyager\Facades\Voyager;

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', function () {
    $banners = Banner::orderBy('created_at', 'desc')->get();
    $featured = Product::where('featured', true)->orderBy('created_at', 'desc')->get(); //latest trending
    $special = Product::where('special', true)->orderBy('created_at', 'desc')->get(); //latest special
    $brands = Brand::orderBy('created_at', 'desc')->get();
    return view('home', compact('featured', 'special', 'banners', 'brands'));
});

// Show New Arrivals 
Route::get('/new-arrivals', [ProductController::class, 'newProducts'])->name('products.new');

// Show products by category
Route::get('/category/{category}', [ProductController::class, 'showByCategory'])->name('category.by_category');

//For extra categories e.g. Italy, Summer, Accessories etc
Route::get('/shop-more', [ProductController::class, 'showMore'])->name('shop.more');

// Show all products
Route::get('/all-items', [ProductController::class, 'allProducts'])->name('products.all');

// Show single product
Route::get('/products/{slug}', [ProductController::class, 'shopSingle'])->name('shop.single');

// search bar submission
Route::get('/search', [ProductController::class, 'search'])->name('search');

// Route::get('/about', function () {
//     return view('about');
// });

// Contact us routes
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');


//Carting routes
Route::get('cart', [CartController::class, 'cart'])->name('cart');

Route::post('/add-cart/{productId}', [CartController::class, 'addCart'])->name('add.cart');
Route::get('add-quantity/{id}', [CartController::class, 'addQuantity'])->name('add.quantity');
Route::get('decrease-quantity/{id}', [CartController::class, 'decreaseQuantity'])->name('decrease.quantity');
Route::get('remove-item/{id}', [CartController::class, 'removeItem'])->name('remove.item');


//Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout/pay', [CheckoutController::class, 'pay'])->name('checkout.pay');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

Route::post('stripe/webhook', 'StripeWebhookController@handleWebhook')->name('cashier.webhook')->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
