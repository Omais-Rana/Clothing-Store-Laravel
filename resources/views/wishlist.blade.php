@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
            style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
        </ol>
    </nav>
    <div class="cart-area table-area pt-110 pb-95 float-left w-100">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class=" cart-wrapper float-left w-100">
                <div class="table-responsive">
                    <table class="table product-table text-center">
                        <thead>
                            <tr>
                                <th class="table-remove text-uppercase">remove</th>
                                <th class="table-image text-uppercase">image</th>
                                <th class="table-p-name text-uppercase">product</th>
                                <th class="table-p-price text-uppercase">price</th>
                                <th class="table-p-qty text-uppercase">Stock Status</th>
                                <th class="table-total text-uppercase">Product Page</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="table-remove">
                                        <form action="{{ route('wishlist.remove', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="material-icons"
                                                    style="color: #2d2d2d">delete</i></button>
                                        </form>
                                    </td>
                                    <?php $images = json_decode($product->product_images); ?>
                                    <td class="table-image"><img src="{{ Voyager::image($images[0]) }}" alt="Item image"
                                            style="width: 70px;"></td>
                                    <td class="table-p-name text-capitalize">{{ $product->product_name }}</td>
                                    <td class="table-p-price">
                                        <p>${{ $product->product_price }}</p>
                                    </td>

                                    <td class="table-p-qty">
                                        @if ($product->product_stock === 0)
                                            Out Of Stock
                                        @else
                                            In Stock
                                        @endif
                                    </td>
                                    <td class="table-addtocart"><a href="{{ route('shop.single', $product->slug) }}"
                                            class="btn-primary btn">See
                                            Details</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <p>No Items Added</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
