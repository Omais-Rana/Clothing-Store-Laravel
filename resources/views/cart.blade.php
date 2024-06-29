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

                            <div class="card border shadow-0">
                                <div class="m-4">
                                    @foreach ($items as $item)
                                        <div class="row gy-3 mb-4">
                                            <div class="col-lg-5">
                                                <div class="me-lg-5">
                                                    <div class="d-flex">
                                                        <?php $images = json_decode($item->associatedModel->product_images); ?>
                                                        <img src="{{ Voyager::image($images[0]) }}"
                                                            class="border rounded me-3" style="width: 96px; height: 96px"
                                                            alt="Product Image" />

                                                        <div class="">
                                                            <p>{{ $item->name }}</p>
                                                            <p class="text-muted">
                                                                {{ Number::currency($item->price, 'USD') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-6">
                                                <td>
                                                    <div class="input-group bootstrap-touchspin">
                                                        <span class="input-group-btn"><a
                                                                href="{{ route('decrease.quantity', $item->id) }}"
                                                                class="btn btn-default bootstrap-touchspin-down"
                                                                type="button">-</a></span><span
                                                            class="input-group-addon bootstrap-touchspin-prefix"
                                                            style="display: none"></span>
                                                        <input type="text" name="" value="{{ $item->quantity }}"
                                                            class="form-control mx-1" />
                                                        <span class="input-group-addon bootstrap-touchspin-postfix"
                                                            style="display: none"></span><span class="input-group-btn">
                                                            <a href="{{ route('add.quantity', $item->id) }}"
                                                                class="btn btn-default bootstrap-touchspin-up"
                                                                type="button">+</a></span>
                                                    </div>
                                                </td>
                                                <div class="">
                                                    <p class="h6">
                                                        ${{ $item->quantity * $item->price }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                                <div class="float-md-end">
                                                    <a href="{{ route('remove.item', $item->id) }}"
                                                        class="btn btn-light border text-danger icon-hover-danger">
                                                        Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- cart -->
                        <!-- summary -->
                        <div class="col-lg-3">
                            <div class="card mb-3 pt-10 pb-10 border shadow-0 text-center">
                                <h3 style="color: #2d2d2d">Order Summary</h2>
                            </div>
                            <div class="card shadow-0 border">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-2">Total Price:</p>
                                        <p class="mb-2 fw-bold">{{ Number::currency($total, 'USD') }}</p>
                                    </div>

                                    <div class="mt-3">
                                        <a href="#" class="btn btn-success w-100 shadow-0 mb-2">
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
