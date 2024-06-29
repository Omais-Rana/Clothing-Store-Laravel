<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function cart()
    {
        $total = Cart::getTotal();
        $items = Cart::getContent();

        return view('cart', compact('items', 'total'));
    }

    public function addCart($productId)
    {
        $product = Product::findOrFail($productId);

        // Fetch product images and prepare for storage in cart
        $images = json_decode($product->product_images);

        // Ensure only the first image path is stored in the cart attributes
        $imageToStore = isset($images[0]) ? $images[0] : null;

        Cart::add([
            'id' => $productId,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => 1,
            'attributes' => [
                'image' => $imageToStore, // Store only the first image path
            ],
            'associatedModel' => $product
        ]);

        return redirect()->route('cart')->with('success', 'Item has been addeed to the cart');
    }

    public function addQuantity($productId)
    {
        Cart::update($productId, [
            'quantity' => +1
        ]);

        return back()->with('success', 'Quantity has been increased');
    }

    public function decreaseQuantity($productId)
    {
        Cart::update($productId, [
            'quantity' => -1
        ]);

        return back()->with('success', 'item quantity has been decreased');
    }

    public function removeItem($productId)
    {
        Cart::remove($productId);
        return back()->with('success', 'item has been removed from the cart');
    }
}
