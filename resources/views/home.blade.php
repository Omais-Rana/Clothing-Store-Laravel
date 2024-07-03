@extends('layouts.app')
<style>
    #ttcmstestimonial {
        background: url("{{ asset('assets/img/banner/parellex-bg.jpg') }}");
    }
</style>
@section('content')
    <main class="index layout1">
        <!-- Hero section -->
        <div class="slider-wrapper my-40 my-sm-25 float-left w-100">
            <div class="container">
                <div class="ttloading-bg"></div>
                <div class="slider slider-for owl-carousel">
                    @foreach ($banners as $banner)
                        <?php $images = json_decode($banner->banner_images); ?>
                        @foreach ($images as $image)
                            <div>
                                <a href="#">
                                    <img src="{{ Voyager::image($image) }}" alt="" height="800" width="1600" />
                                </a>
                                <div class="slider-content-wrap center effect_top">
                                    <div class="slider-title mb-20 text-capitalize float-left w-100">WHOLESALE WOMEN
                                        CLOTHING
                                    </div>
                                    <div class="slider-button text-uppercase float-left w-100"><a
                                            href="{{ route('products.all') }}">Shop
                                            Now</a></div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Hero section -->


        <div class="main-content">
            <!-- 2 banners below Hero -->
            <div id="ttcmsbanner" class="ttcmsbanner my-40 my-sm-25">
                <div class="ttbannerblock container text-center">
                    <div class="row">
                        <div class="ttbanner1 ttbanner col-sm-6 col-xs-6 left-to-right hb-animate-element">
                            <div class="ttbanner-img"><a href="{{ route('products.all') }}"><img
                                        src="{{ asset('assets/img/banner/cms-01.jpg') }}" alt="cms-01" height="600"
                                        width="630"></a></div>
                            <div class="ttbanner-inner d-inline-block align-top float-none">
                                <div class="ttbanner-desc float-left w-100">
                                    <h2 class="ttbanner-heading text-uppercase float-left w-100">Womens</h2>
                                    <span class="title text-uppercase float-left w-100 pb-3">collection</span>
                                    <span class="subtitle float-left w-100 py-20"> We specialise in supplying the latest
                                        fresh catwalk trends to a wide range of retail businesses and boutiques. With over
                                        20 years of experience in women’s wholesale boutique clothing</span>
                                    <span class="shop-now float-left w-100"><a href="{{ route('products.all') }}"
                                            class="d-inline-block align-top float-none btn-primary">Shop Now</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="ttbanner2 ttbanner col-sm-6 col-xs-6 right-to-left hb-animate-element">
                            <div class="ttbanner-img"><a href="{{ route('products.all') }}"><img
                                        src="{{ asset('assets/img/banner/cms-02.jpg') }}" alt="cms-02" height="600"
                                        width="630"></a></div>
                            <div class="ttbanner-inner d-inline-block align-top float-none">
                                <div class="ttbanner-desc">
                                    <h2 class="ttbanner-heading text-uppercase">Women</h2>
                                    <span class="title text-uppercase float-left w-100 pb-3">Wholesale</span>
                                    <span class="subtitle float-left w-100 py-20">Wholesale women's clothing includes a wide
                                        selection of garments, including dresses, tops, pants, skirts, jackets, and more.
                                        These items may be produced by several brands, designers, or manufacturers.</span>
                                    <span class="shop-now float-left w-100"><a href="{{ route('products.all') }}"
                                            class="d-inline-block align-top float-none btn-primary">Shop Now</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End 2 banners -->

            <!-- Featured and Testimonials -->
            <div id="main">
                <!-- featured products sections -->
                <div id="hometab" class="home-tab my-40 my-sm-25 bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="row">
                            <div class="tt-title d-inline-block float-none w-100 text-center">Trending Products</div>

                            <div class="main-content w-100 float-left">
                                <!-- products -->
                                <div class="float-left w-100" id="ttnew-main" role="tabpanel" aria-labelledby="new-tab">
                                    <section id="ttnew" class="ttnew-products">
                                        <div class="ttnew-content products grid owl-carousel" id="owl1">
                                            @foreach ($featured as $product)
                                                <div class="product-layouts">
                                                    <div class="product-thumb">
                                                        <div class="image zoom">
                                                            <a href="{{ route('shop.single', $product->slug) }}">

                                                                <?php $images = json_decode($product->product_images); ?>

                                                                <?php
                                                                
                                                                $firstImage = isset($images[0]) ? $images[0] : null;
                                                                $secondImage = isset($images[1]) ? $images[1] : null;
                                                                ?>

                                                                @if ($firstImage)
                                                                    <img src="{{ Voyager::image($firstImage) }}"
                                                                        alt="01" height="501" width="385" />
                                                                @endif

                                                                @if ($secondImage)
                                                                    <img src="{{ Voyager::image($secondImage) }}"
                                                                        alt="02" class="second_image img-responsive"
                                                                        height="501" width="385" />
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
                                                                    <div class="old-price">${{ $product->product_cut_price }}
                                                                    </div>
                                                                @endisset
                                                            </div>
                                                            <div class="button-wrapper">
                                                                <div class="button-group text-center">

                                                                    <button type="button" class="btn btn-primary btn-cart"
                                                                        <?php if ($product->product_stock === 0): ?> disabled <?php endif; ?>
                                                                        data-target="#cart-pop" data-toggle="modal">
                                                                        <a href="{{ url('/cart') }}">
                                                                            <i
                                                                                class="material-icons">shopping_cart</i><span>Add
                                                                                to cart</span></a>
                                                                    </button>


                                                                    <button type="button"
                                                                        class="btn btn-primary btn-quickview"
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
                                        </div>
                                    </section>
                                </div>
                                <!-- end products -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End featured products roducts -->

                <!-- Testimonials section-->
                <div id="ttcmstestimonial" class="my-40 my-sm-25 bottom-to-top hb-animate-element">
                    <div class="tttestimonial-content container">
                        <div class="tttestimonial-inner">
                            <div class="tttestimonial owl-carousel">
                                <div>
                                    <div class="testimonial-block">
                                        <div class="testimonial-image"><img alt=""
                                                src="{{ asset('assets/img/banner/user1.jpg') }}" height="120"
                                                width="120" /></div>
                                        <div class="testimonial-content">
                                            <div class="testimonial-desc">
                                                <p>Duis faucibus enim vitae nunc molestie, nec facilisis arcu pulvinar.
                                                    Nullam mattis arcu convallis, bibendum dui ac, laoreet est.Vivamus
                                                    interdum egastas rutrum. Quisque laoreet ante sed placerat
                                                    imperdiet.
                                                </p>
                                            </div>
                                            <div class="testimonial-user-title">
                                                <h4>John Duff</h4>
                                                <div class="user-designation">CEO</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="testimonial-block">
                                        <div class="testimonial-image"><img alt=""
                                                src="{{ asset('assets/img/banner/user2.jpg') }}" height="120"
                                                width="120" /></div>
                                        <div class="testimonial-content">
                                            <div class="testimonial-desc">
                                                <p>Duis faucibus enim vitae nunc molestie, nec facilisis arcu pulvinar.
                                                    Nullam mattis arcu convallis, bibendum dui ac, laoreet est.Vivamus
                                                    interdum egastas rutrum. Quisque laoreet ante sed placerat
                                                    imperdiet.
                                                </p>
                                            </div>
                                            <div class="testimonial-user-title">
                                                <h4>Nazli dof</h4>
                                                <div class="user-designation">Marketing Manager</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="testimonial-block">
                                        <div class="testimonial-image"><img alt=""
                                                src="{{ asset('assets/img/banner/user3.jpg') }}" height="120"
                                                width="120" /></div>
                                        <div class="testimonial-content">
                                            <div class="testimonial-desc">
                                                <p>Duis faucibus enim vitae nunc molestie, nec facilisis arcu pulvinar.
                                                    Nullam mattis arcu convallis, bibendum dui ac, laoreet est.Vivamus
                                                    interdum egastas rutrum. Quisque laoreet ante sed placerat
                                                    imperdiet.
                                                </p>
                                            </div>
                                            <div class="testimonial-user-title">
                                                <h4>Aly Vefa</h4>
                                                <div class="user-designation">Sales Exuctive</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Testimonials -->

                <!-- 2 banners below testimonials -->
                <div id="ttcmssubbanner" class="ttcmssubbanner my-40 my-sm-25 bottom-to-top hb-animate-element">
                    <div class="ttbannerblock container">
                        <div class="row">
                            <div class="ttbanner1 ttbanner col-sm-6 col-xs-6">
                                <div class="ttbanner-img"><a href="#"><img
                                            src="{{ asset('assets/img/banner/cms-04.jpg') }}" alt="cms-03"
                                            height="600" width="400"></a></div>
                                <div class="ttbanner-inner">
                                    <div class="ttbanner-desc text-center">
                                        <span class="title text-uppercase">summer shop</span>
                                        <span class="subtitle text-uppercase py-20">up to 30% off</span>
                                        <span class="shop-now text-capitalize"><a href="#" class="btn-primary">shop
                                                now</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ttbanner2 ttbanner col-sm-6">
                                <div class="ttbanner-img"><a href="#"><img
                                            src="{{ asset('assets/img/banner/cms-03.jpg') }}" alt="cms-04"
                                            height="600" width="400"></a></div>
                                <div class="ttbanner-inner">
                                    <div class="ttbanner-desc text-center">
                                        <span class="title text-uppercase">winter shop</span>
                                        <span class="subtitle text-uppercase py-20">up to 30% off</span>
                                        <span class="shop-now text-capitalize"><a href="#" class="btn-primary">shop
                                                now</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End 2 banners below testimonials -->

                <!-- Special Products -->
                <div id="ttspecial" class="ttspecial my-40 bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="row">
                            <div class="tt-title d-inline-block float-none w-100 text-center">special products</div>
                            <div class="ttspecial-content products grid owl-carousel">
                                @foreach ($special as $product)
                                    <div class="product-layouts">
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
                                                            <a href="{{ url('/cart') }}">
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Special Products -->

                <!-- Brands -->
                <div id="ttbrandlogo" class="my-40 my-sm-25 bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="tt-brand owl-carousel">
                            @foreach ($brands as $brand)
                                <?php $images = json_decode($brand->Brand_logo); ?>
                                @foreach ($images as $image)
                                    <div class="item">
                                        <a href="#">
                                            <img src="{{ Voyager::image($image) }}" alt="" height="800"
                                                width="1600" />
                                        </a>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End Brands -->
            </div>
        </div>
    </main>
@endsection
