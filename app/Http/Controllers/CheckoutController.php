<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Order;
<<<<<<< Updated upstream
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Mail\AdminOrderNotification;
=======
use App\Models\Product;
use Illuminate\Support\Facades\Http;
>>>>>>> Stashed changes

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $cartItems = Cart::getContent();
        $totalAmount = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $shippingFee = $this->calculateShippingFee($cartItems);

        return view('checkout', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
            'shippingFee' => $shippingFee,
        ]);
    }

    private function calculateShippingFee($cartItems)
    {
        // Ensure $cartItems is a collection
        if (!($cartItems instanceof \Illuminate\Support\Collection)) {
            return 10.00;
        }

        $totalQuantity = $cartItems->sum('quantity');

        if ($totalQuantity > 50 && $totalQuantity < 100) {
            return 20.00;
        } elseif ($totalQuantity >= 100 && $totalQuantity < 150) {
            return 30.00;
        } elseif ($totalQuantity >= 150) {
            return 40.00;
        } else {
            return 10.00;
        }
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
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $product = Product::find($item->attributes['product_id']);

            // if ($item->quantity < $product->product_quantity) {
            //     return redirect()->back()->with('error', 'Minimum quantity for ' . $product->product_name . ' is ' . $product->product_quantity);
            // }

            $productDetails[] = [
                'name' => $item->name,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'size' => $item->attributes['size'] ?? 'Not specified',
                'color' => $item->attributes['color'] ?? 'Not specified',
            ];

            $totalAmount += $item->price * $item->quantity;
        }

        $shippingFee = $this->calculateShippingFee($cartItems);
        $totalAmount += $shippingFee;

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => $email,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
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
            $order = Order::where('email', $session->customer_email)
                ->latest()
                ->first();

            if ($order) {
<<<<<<< Updated upstream
                Mail::to($order->email)->send(new OrderConfirmation($order));
                Mail::to('poshmarktradinguk@gmail.com')->send(new AdminOrderNotification($order));
            }
=======
                // Send Order Confirmation to Customer via Mailgun
                $this->sendMailgunEmail($order->email, 'Order Confirmation', view('emails.order_confirmation', compact('order'))->render());
>>>>>>> Stashed changes

                // Send Order Notification to Admin via Mailgun
                $this->sendMailgunEmail('prouser6969@gmail.com', 'New Order Notification', view('emails.admin_order_notification', compact('order'))->render());
            }
            Cart::clear();
            return view('checkout.success');
        }

        return redirect()->route('checkout.cancel');
    }

    public function processCod(Request $request)
    {
        // Validate the request
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
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $product = Product::find($item->attributes['product_id']);

            $productDetails[] = [
                'name' => $item->name,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'size' => $item->attributes['size'] ?? 'Not specified',
                'color' => $item->attributes['color'] ?? 'Not specified',
            ];

            $totalAmount += $item->price * $item->quantity;
        }

        $shippingFee = $this->calculateShippingFee($cartItems);
        $totalAmount += $shippingFee;

        // Save order details to the database
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

        // Send Order Confirmation to Customer via Mailgun
        $this->sendMailgunEmail($order->email, 'Order Confirmation', view('emails.order_confirmation', compact('order'))->render());

        // Send Order Notification to Admin via Mailgun
        $this->sendMailgunEmail('prouser6969@gmail.com', 'New Order Notification', view('emails.admin_order_notification', compact('order'))->render());

        Cart::clear();
        return view('checkout.success');
    }


    public function cancel()
    {
        return view('checkout.cancel');
    }

    private function sendMailgunEmail($to, $subject, $htmlContent)
    {
        $domain = env('MAILGUN_DOMAIN');
        $apiKey = env('MAILGUN_SECRET');
        $from = 'noreply@' . $domain;

        $response = Http::withBasicAuth('api', $apiKey)
            ->asForm()
            ->post("https://api.mailgun.net/v3/$domain/messages", [
                'from' => $from,
                'to' => $to,
                'subject' => $subject,
                'html' => $htmlContent,
            ]);

        if (!$response->successful()) {
            Log::error('Mailgun failed to send email.', ['response' => $response->body()]);
        }
    }
}
