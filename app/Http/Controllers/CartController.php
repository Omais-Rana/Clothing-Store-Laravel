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

    public function addCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $images = json_decode($product->product_images);

        $imageToStore = isset($images[0]) ? $images[0] : null;

        $size = $request->input('size');
        $color = $request->input('color');

        $uniqueId = $productId . '-' . $size . '-' . $color;

        $existingItem = Cart::get($uniqueId);

        if ($existingItem) {
            Cart::update($uniqueId, array(
                'quantity' => $existingItem->quantity + 1,
            ));
        } else {
            Cart::add(array(
                'id' => $uniqueId,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => 1,
                'attributes' => array(
                    'image' => $imageToStore,
                    'size' => $size,
                    'color' => $color,
                    'product_id' => $productId
                ),
                'associatedModel' => $product
            ));
        }

        return redirect()->route('cart')->with('success', 'Item has been added to the cart');
    }

    public function addQuantity($id)
    {
        Cart::update($id, [
            'quantity' => +1
        ]);

        return back()->with('success', 'Quantity has been increased');
    }

    public function decreaseQuantity($id)
    {
        Cart::update($id, [
            'quantity' => -1
        ]);

        return back()->with('success', 'item quantity has been decreased');
    }

    public function removeItem($id)
    {
        Cart::remove($id);
        return back()->with('success', 'item has been removed from the cart');
    }
}
