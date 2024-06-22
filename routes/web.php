<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
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

// //Show on homepage:
// Route::get('/', function () {
//     $top_categories = Category::where('category_top', true)->orderBy('created_at', 'desc')->get(); //top categories
//     $bestsellers = Product::where('bestseller', true)->orderBy('created_at', 'desc')->get(); //latest bestsellers
//     $latest_products = Product::orderBy('created_at', 'desc')->take(3)->get(); //latest products
//     $posts = Post::orderBy('created_at', 'desc')->first(); //Most latest single blog
//     $postsLatest = Post::orderBy('created_at', 'desc')->take(3)->get(); //Three latest blogs
//     $banners = Banner::orderBy('created_at', 'desc')->get(); //Get latest banner images
//     return view('index', compact('top_categories', 'latest_products', 'bestsellers', 'posts', 'postsLatest', 'banners'));
// });


Route::get('/category/{category}', [ProductController::class, 'showByCategory'])->name('category.by_category');

// Route::get('/products/{slug}', [ProductController::class, 'shopSingle'])->name('shop.single');

// // search bar submission
// Route::get('/search', [ProductController::class, 'search'])->name('search');

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/blog', function () {
//     $posts = Post::orderBy('created_at', 'desc')->get();
//     return view('blog', compact('posts'));
// });

// //Carting routes
// Route::get('cart', [CartController::class, 'cart'])->name('cart');
// Route::get('add-cart/{productId}', [CartController::class, 'addCart'])->name('add.cart');

// Route::get('add-quantity/{productId}', [CartController::class, 'addQuantity'])->name('add.quantity');

// Route::get('decrease-quantity/{productId}', [CartController::class, 'decreaseQuantity'])->name('decrease.quantity');

// Route::get('remove-item/{productId}', [CartController::class, 'removeItem'])->name('remove.item');

// //Show a single blog
// Route::get('/{slug}', [BlogController::class, 'blogSingle'])->name('blog.single');
