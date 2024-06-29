@extends('layouts.app')
@section('content')
    <style>
        h4.product-title {
            font: 400 18px/20px Playfair Display, Helvetica, sans-serif;
            color: #000;
        }
    </style>
    <main id="product">
        <nav aria-label="breadcrumb" class="w-100 float-left">
            <ol class="breadcrumb parallax justify-content-center"
                data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
                style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
        <div class="product-deatils-section float-left w-100 mt-5">
            <div class="container">
                <div class="row">
                    {{-- Images --}}
                    <div class="left-columm col-lg-5 col-md-5">
                        <div class="product-large-image tab-content">
                            <?php $images = json_decode($product->product_images, true); ?>
                            @if (is_array($images) && count($images) > 0)
                                @foreach ($images as $index => $image)
                                    <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="product-{{ $index + 1 }}"
                                        role="tabpanel" aria-labelledby="product-tab-{{ $index + 1 }}">
                                        <div class="single-img img-full">
                                            <img src="{{ Voyager::image($image) }}" class="img-fluid zoomImg"
                                                alt="Item Image">
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No images available for this product.</p>
                            @endif
                        </div>

                        <div class="default small-image-list float-left w-100">
                            <div class="nav-add small-image-slider-single-product-tabstyle-3 owl-carousel" role="tablist">
                                @if (is_array($images) && count($images) > 0)
                                    @foreach ($images as $index => $image)
                                        <div class="single-small-image img-full">
                                            <a data-toggle="tab" id="product-tab-{{ $index + 1 }}"
                                                href="#product-{{ $index + 1 }}"
                                                class="img {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ Voyager::image($image) }}" class="img-fluid" alt="Item Image">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="right-columm col-lg-7 col-md-7">
                        <div class="product-information">
                            {{-- Name and Short description --}}
                            <h4 class="product-title text-capitalize float-left w-100">{{ $product->product_name }}</h4>
                            <div class="product_description description">
                                {{ $product->product_description }}
                            </div>
                            {{-- Star rating --}}
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
                            {{-- Price --}}
                            <div class="price float-left w-100 d-flex">
                                <div class="regular-price">${{ $product->product_price }}</div>
                                @isset($product->product_cut_price)
                                    <div class="old-price">${{ $product->product_cut_price }}</div>
                                @endisset

                            </div>

                            {{-- Size, Color and Add to Cart --}}
                            <form action="{{ route('add.cart', $product->id) }}" method="post">
                                @csrf
                                <div class="product-variants float-left w-100">
                                    <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                        <h5>Size:</h5>
                                        <select class="form-control" name="size" required>
                                            <option value="" disabled selected>Size</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                        <h5>Color:</h5>
                                        <select class="form-control" name="color" required>
                                            <option value="" disabled selected>Color</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i
                                        class="material-icons">shopping_cart</i>Add to Cart</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-area float-left w-100">
            {{-- Full Description --}}
            <div class="container">
                <div class="tabs">
                    <ul class="nav nav-tabs justify-content-start">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#product-tab1"
                                id="tab1">
                                <div class="tab-title">Description</div>
                            </a></li>
                    </ul>
                </div>
                <div class="tab-content float-left w-100">
                    <div class="tab-pane active" id="product-tab1" role="tabpanel" aria-labelledby="tab1">
                        <div class="description">
                            {{ $product->product_description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
