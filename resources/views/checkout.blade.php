@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
            style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </nav>
    <div class="container">
        <form id="payment-form" action="{{ route('checkout.pay') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <h3>Billing Details</h3>
                    <div class="form-group">
                        <label for="name">Name<span class="required">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="required">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone<span class="required">*</span></label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address<span class="required">*</span></label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City<span class="required">*</span></label>
                        <input type="text" id="city" name="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">ZIP Code<span class="required">*</span></label>
                        <input type="text" id="zip" name="zip" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Order Summary</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td>
                                        <img src="{{ Voyager::image($item->attributes->image) }}" alt=""
                                            width="50">
                                        {{ $item->name }}
                                    </td>
                                    <td>${{ $item->price }}</td>
                                    <td>{{ $item->attributes['size'] ?? 'Not specified' }}</td>
                                    <td>{{ $item->attributes['color'] ?? 'Not specified' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ $item->price * $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p><strong>Total Amount:</strong> ${{ $totalAmount }}</p>
                    <button type="submit" id="submit-payment" class="btn btn-primary">Proceed to Payment</button>
                </div>
            </div>
        </form>
    </div>
@endsection
