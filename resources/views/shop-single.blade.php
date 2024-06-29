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
                            <div class="product-variants float-left w-100">
                                {{-- Size --}}

                                <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Size:</h5>
                                    <select class="form-control" name="size">
                                        <option value="" selected disabled>Size</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                {{-- Color --}}
                                <div class="col-md-3 col-sm-6 col-xs-12 size-options d-flex align-items-center">
                                    <h5>Color:</h5>
                                    <select class="form-control" name="select">
                                        <option value="" selected disabled>Color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color }}">{{ $color }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            {{-- Cart and Social Media --}}
                            <div class="btn-cart d-flex align-items-center float-left w-100">
                                <a href="{{ route('add.cart', $product->id) }}">
                                    <button type="button" class="btn btn-primary btn-cart m-0" data-target="#cart-pop"
                                        data-toggle="modal"><i class="material-icons">shopping_cart</i> Add To Cart</button>
                                </a>
                            </div>
                            <div class="social-sharing float-left w-100">
                                <ul class="d-flex">
                                    <li class="facebook">
                                        <a href="#" target="_blank" class="facebook_link">
                                            <svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
                                                <path fill="#666"
                                                    d="M11.344,5.71c0-0.73,0.074-1.122,1.199-1.122h1.502V1.871h-2.404c-2.886,0-3.903,1.36-3.903,3.646v1.765h-1.8V10h1.8v8.128h3.601V10h2.403l0.32-2.718h-2.724L11.344,5.71z">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>

                                    <li class="twitter">
                                        <a href="#" target="_blank" class="twitter_link">
                                            <svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
                                                <path fill="#666"
                                                    d="M18.258,3.266c-0.693,0.405-1.46,0.698-2.277,0.857c-0.653-0.686-1.586-1.115-2.618-1.115c-1.98,0-3.586,1.581-3.586,3.53c0,0.276,0.031,0.545,0.092,0.805C6.888,7.195,4.245,5.79,2.476,3.654C2.167,4.176,1.99,4.781,1.99,5.429c0,1.224,0.633,2.305,1.596,2.938C2.999,8.349,2.445,8.19,1.961,7.925C1.96,7.94,1.96,7.954,1.96,7.97c0,1.71,1.237,3.138,2.877,3.462c-0.301,0.08-0.617,0.123-0.945,0.123c-0.23,0-0.456-0.021-0.674-0.062c0.456,1.402,1.781,2.422,3.35,2.451c-1.228,0.947-2.773,1.512-4.454,1.512c-0.291,0-0.575-0.016-0.855-0.049c1.588,1,3.473,1.586,5.498,1.586c6.598,0,10.205-5.379,10.205-10.045c0-0.153-0.003-0.305-0.01-0.456c0.7-0.499,1.308-1.12,1.789-1.827c-0.644,0.28-1.334,0.469-2.06,0.555C17.422,4.782,17.99,4.091,18.258,3.266">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>

                                    <li class="google">
                                        <a href="#" target="_blank" class="google_link">
                                            <svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
                                                <path fill="#666"
                                                    d="M8.937,10.603c-0.383-0.284-0.741-0.706-0.754-0.837c0-0.223,0-0.326,0.526-0.758c0.684-0.56,1.062-1.297,1.062-2.076c0-0.672-0.188-1.273-0.512-1.71h0.286l1.58-1.196h-4.28c-1.717,0-3.222,1.348-3.222,2.885c0,1.587,1.162,2.794,2.726,2.858c-0.024,0.113-0.037,0.225-0.037,0.334c0,0.229,0.052,0.448,0.157,0.659c-1.938,0.013-3.569,1.309-3.569,2.84c0,1.375,1.571,2.373,3.735,2.373c2.338,0,3.599-1.463,3.599-2.84C10.233,11.99,9.882,11.303,8.937,10.603 M5.443,6.864C5.371,6.291,5.491,5.761,5.766,5.444c0.167-0.192,0.383-0.293,0.623-0.293l0,0h0.028c0.717,0.022,1.405,0.871,1.532,1.89c0.073,0.583-0.052,1.127-0.333,1.451c-0.167,0.192-0.378,0.293-0.64,0.292h0C6.273,8.765,5.571,7.883,5.443,6.864 M6.628,14.786c-1.066,0-1.902-0.687-1.902-1.562c0-0.803,0.978-1.508,2.093-1.508l0,0l0,0h0.029c0.241,0.003,0.474,0.04,0.695,0.109l0.221,0.158c0.567,0.405,0.866,0.634,0.956,1.003c0.022,0.097,0.033,0.194,0.033,0.291C8.752,14.278,8.038,14.786,6.628,14.786 M14.85,4.765h-1.493v2.242h-2.249v1.495h2.249v2.233h1.493V8.502h2.252V7.007H14.85V4.765z">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>

                                    <li class="pinterest">
                                        <a href="#" target="_blank" class="pinterest_link">
                                            <svg class="svg-icon" viewBox="0 0 20 20" width="30px" height="30px">
                                                <path fill="#666"
                                                    d="M9.797,2.214C9.466,2.256,9.134,2.297,8.802,2.338C8.178,2.493,7.498,2.64,6.993,2.935C5.646,3.723,4.712,4.643,4.087,6.139C3.985,6.381,3.982,6.615,3.909,6.884c-0.48,1.744,0.37,3.548,1.402,4.173c0.198,0.119,0.649,0.332,0.815,0.049c0.092-0.156,0.071-0.364,0.128-0.546c0.037-0.12,0.154-0.347,0.127-0.496c-0.046-0.255-0.319-0.416-0.434-0.62C5.715,9.027,5.703,8.658,5.59,8.101c0.009-0.075,0.017-0.149,0.026-0.224C5.65,7.254,5.755,6.805,5.948,6.362c0.564-1.301,1.47-2.025,2.931-2.458c0.327-0.097,1.25-0.252,1.734-0.149c0.289,0.05,0.577,0.099,0.866,0.149c1.048,0.33,1.811,0.938,2.218,1.888c0.256,0.591,0.33,1.725,0.154,2.483c-0.085,0.36-0.072,0.667-0.179,0.993c-0.397,1.206-0.979,2.323-2.295,2.633c-0.868,0.205-1.519-0.324-1.733-0.869c-0.06-0.151-0.161-0.418-0.101-0.671c0.229-0.978,0.56-1.854,0.815-2.831c0.243-0.931-0.218-1.665-0.943-1.837C8.513,5.478,7.816,6.312,7.579,6.858C7.39,7.292,7.276,8.093,7.426,8.672c0.047,0.183,0.269,0.674,0.23,0.844c-0.174,0.755-0.372,1.568-0.587,2.31c-0.223,0.771-0.344,1.562-0.56,2.311c-0.1,0.342-0.096,0.709-0.179,1.066v0.521c-0.075,0.33-0.019,0.916,0.051,1.242c0.045,0.209-0.027,0.467,0.076,0.621c0.002,0.111,0.017,0.135,0.052,0.199c0.319-0.01,0.758-0.848,0.917-1.094c0.304-0.467,0.584-0.967,0.816-1.514c0.208-0.494,0.241-1.039,0.408-1.566c0.12-0.379,0.292-0.824,0.331-1.24h0.025c0.066,0.229,0.306,0.395,0.485,0.52c0.56,0.4,1.525,0.77,2.573,0.523c1.188-0.281,2.133-0.838,2.755-1.664c0.457-0.609,0.804-1.313,1.07-2.112c0.131-0.392,0.158-0.826,0.256-1.241c0.241-1.043-0.082-2.298-0.384-2.981C14.847,3.35,12.902,2.17,9.797,2.214">
                                                </path>
                                            </svg>
                                        </a>
                                    </li>


                                </ul>
                            </div>
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
