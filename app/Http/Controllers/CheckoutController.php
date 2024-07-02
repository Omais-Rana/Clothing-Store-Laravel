<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Order; // Import your Order model
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $cartItems = Cart::getContent();
        $totalAmount = $cartItems->sum(fn ($item) => $item->price * $item->quantity);
        return view('checkout', ['cartItems' => $cartItems, 'totalAmount' => $totalAmount]);
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

        // Retrieve necessary data
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $city = $request->input('city');
        $zip = $request->input('zip');

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a Stripe Session
        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => $email,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Total Purchase',
                    ],
                    'unit_amount' => Cart::getTotal() * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        // Store order details in your database
        $order = new Order();
        $order->name = $name;
        $order->email = $email;
        $order->phone = $phone;
        $order->address = $address;
        $order->city = $city;
        $order->zip = $zip;
        $order->total_amount = Cart::getTotal() * 100;
        // Add more fields as needed
        $order->save();

        // Redirect to Stripe Checkout session URL
        return redirect($checkoutSession->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::retrieve($sessionId);

        if ($session->payment_status === 'paid') {
            // Optionally, send order confirmation email
            // Mail::to($session->customer_email)->send(new OrderConfirmation($order));

            return view('checkout.success');
        }

        return redirect()->route('checkout.cancel');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
