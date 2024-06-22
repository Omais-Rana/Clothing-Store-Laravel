<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartComposer
{
    public function compose(View $view)
    {
        $cartItems = Cart::getContent();
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $totalAmount += $item->price * $item->quantity;
        }
        $view->with('totalAmount', $totalAmount);
    }
}
