<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $cartItems = Cart::getContent();
        $totalAmount = $cartItems->sum(fn ($item) => $item->price * $item->quantity);


        $defaultCity = 'Default';
        $shippingFee = $this->getShippingFee($defaultCity);

        $totalAmount += $shippingFee;


        return view('checkout', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
            'shippingFee' => $shippingFee,
        ]);
    }
    private function getShippingFee($city)
    {
        $city = strtolower($city);

        $shippingFees = [
            'default' => 20.00,
            'new york' => 10.00,
            'los angeles' => 12.00,
            'chicago' => 8.00,
            // Add more cities
        ];

        $defaultShippingFee = 20.00;

        return $shippingFees[$city] ?? $defaultShippingFee;
    }

    public function pay(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $city = $request->input('city');
        $zip = $request->input('zip');

        $cartItems = Cart::getContent();
        $productDetails = [];
        foreach ($cartItems as $item) {
            $productDetails[] = [
                'name' => $item->name,
                'quantity' => $item->quantity,
                'size' => $item->attributes['size'] ?? 'Not specified',
                'color' => $item->attributes['color'] ?? 'Not specified',
            ];
        }

        $shippingFee = $this->getShippingFee($request->city);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $totalAmount = $cartItems->sum(fn ($item) => $item->price * $item->quantity) + $shippingFee;

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => $email,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Total Purchase',
                    ],
                    'unit_amount' => $totalAmount * 100, // Included shipping fee
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        $order = new Order();
        $order->name = $name;
        $order->email = $email;
        $order->phone = $phone;
        $order->address = $address;
        $order->city = $city;
        $order->zip = $zip;
        $order->total_amount = $totalAmount; // Save total amount including shipping fee

        $order->product_details = json_encode($productDetails);

        $order->save();

        return redirect($checkoutSession->url);
    }


    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::retrieve($sessionId);

        if ($session->payment_status === 'paid') {
            // $order = Order::where('email', $session->customer_email)
            //     ->latest()
            //     ->first();

            // if ($order) {
            //     Mail::to($order->email)->send(new OrderConfirmation($order));
            // }

            return view('checkout.success');
        }

        return redirect()->route('checkout.cancel');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
