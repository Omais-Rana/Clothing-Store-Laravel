<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Session::get('wishlist', []);
        $products = Product::whereIn('id', array_keys($wishlist))->get();
        $totalWishlisted = count($wishlist);

        return view('wishlist', [
            'products' => $products,
            'totalWishlisted' => $totalWishlisted,
        ]);
    }

    public function add($product_id)
    {
        $wishlist = Session::get('wishlist', []);
        $wishlist[$product_id] = true;
        Session::put('wishlist', $wishlist);

        return redirect()->route('wishlist.index')->with('success', 'Product added to wishlist!');
    }

    public function remove($product_id)
    {
        $wishlist = Session::get('wishlist', []);
        unset($wishlist[$product_id]);
        Session::put('wishlist', $wishlist);

        return redirect()->route('wishlist.index')->with('success', 'Product removed from wishlist!');
    }

    public static function wishlistCount()
    {
        $wishlist = Session::get('wishlist', []);
        return count($wishlist);
    }
}
