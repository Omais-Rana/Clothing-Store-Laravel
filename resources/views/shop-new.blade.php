@extends('layouts.app')
@section('content')
    <main id="category" class="category">
        <nav aria-label="breadcrumb" class="w-100 float-left">
            <ol class="breadcrumb parallax justify-content-center"
                data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
                style="background-image: url('{{ asset('assets/img/banner/parellex-bg.jpg') }}'); background-position: 50% 0.809717%;">
                <h1 class="text-center" style="color: whitesmoke">NEW ARRIVALS</h1>
            </ol>
        </nav>
        <div class="main-content w-100 float-left ">

            <div class="container m-auto">
                <header class="product-grid-header d-flex d-xs-block d-sm-flex d-lg-flex w-100 float-left">
                    <div
                        class="hidden-sm-down total-products d-flex d-xs-block d-lg-flex col-md-3 col-sm-3 col-xs-12 align-items-center">
                        <div class="row">
                            <h6 class="text-center">Showing {{ $productCount }} results</h6>
                        </div>
                    </div>
                </header>
                <div class="row ">
                    <div class="content-wrapper m-auto col-xl-9 col-lg-9 order-lg-2">
                        <div class="tab-content text-center products w-100 float-left">
                            <div class="tab-pane grid fade active" id="grid" role="tabpanel">
                                <div class="row">
                                    @foreach ($newProducts as $product)
                                        <div class="product-layouts col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                            <div class="product-thumb">
                                                <div class="image zoom">
                                                    <a href="{{ route('shop.single', $product->slug) }}">

                                                        <?php $images = json_decode($product->product_images); ?>

                                                        <?php
                                                        
                                                        $firstImage = isset($images[0]) ? $images[0] : null;
                                                        $secondImage = isset($images[1]) ? $images[1] : null;
                                                        ?>

                                                        @if ($firstImage)
                                                            <img src="{{ Voyager::image($firstImage) }}" alt="01"
                                                                height="501" width="385" />
                                                        @endif

                                                        @if ($secondImage)
                                                            <img src="{{ Voyager::image($secondImage) }}" alt="02"
                                                                class="second_image img-responsive" height="501"
                                                                width="385" />
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="thumb-description">
                                                    <div class="caption">
                                                        <h4 class="product-title text-capitalize"><a
                                                                href="{{ route('shop.single', $product->slug) }}">{{ $product->product_name }}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="rating">
                                                        <?php $rating = $product->product_star_rating; ?>

                                                        <div class="product-ratings d-inline-block align-middle">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <span class="fa fa-stack">
                                                                    <i class="material-icons">
                                                                        @if ($i <= $rating)
                                                                            star
                                                                        @else
                                                                            star_outline
                                                                        @endif
                                                                    </i>
                                                                </span>
                                                            @endfor
                                                        </div>

                                                    </div>
                                                    <div class="price">
                                                        <div class="regular-price">${{ $product->product_price }}
                                                        </div>
                                                        @isset($product->product_cut_price)
                                                            <div class="old-price">${{ $product->product_cut_price }}</div>
                                                        @endisset
                                                    </div>
                                                    <div class="button-wrapper">
                                                        <div class="button-group text-center">
                                                            <button type="button" class="btn btn-primary btn-cart"
                                                                <?php if ($product->product_stock === 0): ?> disabled <?php endif; ?>
                                                                data-target="#cart-pop" data-toggle="modal">
                                                                <a href="{{ route('add.cart', $product->id) }}">
                                                                    <i class="material-icons">shopping_cart</i><span>Add
                                                                        to cart</span></a>
                                                            </button>


                                                            <button type="button" class="btn btn-primary btn-quickview"
                                                                data-toggle="modal" data-target="#product_view"><a
                                                                    href="{{ route('shop.single', $product->slug) }}"><i
                                                                        class="material-icons">visibility</i><span>Quick
                                                                        View</span></a></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @forelse ($newProducts as $product)
                                    @empty
                                        <h5 class="text-center">No new products found.</h5>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
