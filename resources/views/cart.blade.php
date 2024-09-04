@extends('layouts.app')
<style>
    body {
        margin-top: -50px !important;
    }
</style>
@section('content')
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
            style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>

    <!-- cart page area start here -->
    <section class="cart-page pb-130">
        <div class="container">
            <section class="bg-light my-5">
                <div class="container">
                    <div class="row">
                        <!-- cart -->
                        <div class="col-lg-9 ">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <div class="card border shadow-sm">
                                <div class="m-4">
                                    <!-- Desktop Header Row -->
                                    <div class="row gy-3 mb-4 align-items-center text-center d-none d-md-flex">
                                        <div class="col-md-2" style="font-weight:bold">Image</div>
                                        <div class="col-md-2" style="font-weight:bold">Name</div>
                                        <div class="col-md-2" style="font-weight:bold">Price</div>
                                        <div class="col-md-1" style="font-weight:bold">Size</div>
                                        <div class="col-md-1" style="font-weight:bold">Color</div>
                                        <div class="col-md-2" style="font-weight:bold">Quantity</div>
                                        <div class="col-md-1" style="font-weight:bold">Total Price</div>
                                        <div class="col-md-1" style="font-weight:bold">Remove</div>
                                    </div>

                                    @foreach ($items as $item)
                                        @php
                                            $product = $item->associatedModel;
                                            $minQuantity = $product->product_quantity;
                                        @endphp

                                        <!-- Desktop View -->
                                        <div class="row gy-3 mb-4 align-items-center text-center d-none d-md-flex">
                                            <div class="col-md-2">
                                                <?php $images = json_decode($product->product_images); ?>
                                                <img src="{{ Voyager::image($images[0]) }}" class="border rounded"
                                                    style="width: 96px; height: 96px;" alt="Product Image" />
                                            </div>
                                            <div class="col-md-2">
                                                <h6>{{ $item->name }}</h6>
                                            </div>
                                            <div class="col-md-2">
                                                <p class="text-muted">{{ Number::currency($item->price, 'GBP') }}</p>
                                            </div>
                                            <div class="col-md-1">
                                                @if (isset($item->attributes['size']) && is_string($item->attributes['size']))
                                                    {{ $item->attributes['size'] }}
                                                @else
                                                    Not specified
                                                @endif
                                            </div>
                                            <div class="col-md-1">
                                                @if (isset($item->attributes['color']) && is_string($item->attributes['color']))
                                                    {{ $item->attributes['color'] }}
                                                @else
                                                    Not specified
                                                @endif
                                            </div>
                                            <div class="col-md-2">
                                                <p>{{ $item->quantity }}</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>£{{ $item->quantity * $item->price }}</p>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{ route('remove.item', $item->id) }}"><i class="material-icons"
                                                        id="remove" style="color: #666">delete</i></a>
                                            </div>
                                        </div>

                                        <!-- Mobile View -->
                                        <div class="row gy-3 mb-4 align-items-center text-center d-md-none">
                                            <div class="col-12 d-flex justify-content-between">
                                                <div class="d-flex">
                                                    <?php $images = json_decode($product->product_images); ?>
                                                    <img src="{{ Voyager::image($images[0]) }}" class="border rounded me-3"
                                                        style="width: 60px; height: 60px;" alt="Product Image" />
                                                    <div class="text-start" style="padding-left: 70px;">
                                                        <h6 class="mb-0">{{ $item->name }}</h6>
                                                        <small class="text-muted d-block">Price:
                                                            {{ Number::currency($item->price, 'USD') }}</small>
                                                        <small class="text-muted d-block">
                                                            Size: {{ $item->attributes['size'] ?? 'Not specified' }}
                                                        </small>
                                                        <small class="text-muted d-block">
                                                            Color: {{ $item->attributes['color'] ?? 'Not specified' }}
                                                        </small>
                                                        <small class="text-muted d-block">
                                                            Quantity: {{ $item->quantity }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <a href="{{ route('remove.item', $item->id) }}" class="text-danger">
                                                        <i class="material-icons" id="remove"
                                                            style="color: #666">delete</i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <p>Total Price: £{{ $item->quantity * $item->price }}</p>
                                            </div>
                                        </div>

                                        @if (!$loop->last)
                                            <hr />
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- cart -->

                        <!-- summary -->
                        <div class="col-lg-3">
                            <div class="card mb-3 border shadow-0 text-center" style="padding: 10px 0">
                                <h3 style="color: #666; font: 700 22px/20px Playfair Display, Helvetica, sans-serif">Cart
                                    Totals</h2>
                            </div>
                            <div class="card shadow-0 border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Total Items:</p>
                                        <p class="mb-2 fw-bold">{{ Cart::getTotalQuantity() }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Total Amount:</p>
                                        <p class="mb-2 fw-bold">{{ Number::currency($total, 'GBP') }}</p>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ url('/checkout') }}" class="btn btn-primary w-100 shadow-0 mb-2">
                                            Checkout
                                        </a>
                                        <a href="{{ url('/') }}" class="btn btn-light w-100 border mt-2">
                                            Back to shop
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- summary -->
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- cart page area end here -->
@endsection
