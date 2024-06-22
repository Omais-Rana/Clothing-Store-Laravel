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
                                    <div class="slider-button text-uppercase float-left w-100"><a href=" #">Shop
                                            Now</a></div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Hero section -->

        <!-- 2 banners below Hero -->
        <div class="main-content">
            <div id="ttcmsbanner" class="ttcmsbanner my-40 my-sm-25">
                <div class="ttbannerblock container text-center">
                    <div class="row">
                        <div class="ttbanner1 ttbanner col-sm-6 col-xs-6 left-to-right hb-animate-element">
                            <div class="ttbanner-img"><a href="#"><img
                                        src="{{ asset('assets/img/banner/cms-01.jpg') }}" alt="cms-01" height="600"
                                        width="630"></a></div>
                            <div class="ttbanner-inner d-inline-block align-top float-none">
                                <div class="ttbanner-desc float-left w-100">
                                    <h2 class="ttbanner-heading text-uppercase float-left w-100">Womens</h2>
                                    <span class="title text-uppercase float-left w-100 pb-3">collection</span>
                                    <span class="subtitle float-left w-100 py-20"> We specialise in supplying the latest
                                        fresh catwalk trends to a wide range of retail businesses and boutiques. With over
                                        20 years of experience in women’s wholesale boutique clothing</span>
                                    <span class="shop-now float-left w-100"><a href="#"
                                            class="d-inline-block align-top float-none btn-primary">Shop Now</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="ttbanner2 ttbanner col-sm-6 col-xs-6 right-to-left hb-animate-element">
                            <div class="ttbanner-img"><a href="#"><img
                                        src="{{ asset('assets/img/banner/cms-02.jpg') }}" alt="cms-02" height="600"
                                        width="630"></a></div>
                            <div class="ttbanner-inner d-inline-block align-top float-none">
                                <div class="ttbanner-desc">
                                    <h2 class="ttbanner-heading text-uppercase">Women</h2>
                                    <span class="title text-uppercase float-left w-100 pb-3">Wholesale</span>
                                    <span class="subtitle float-left w-100 py-20">Wholesale women's clothing includes a wide
                                        selection of garments, including dresses, tops, pants, skirts, jackets, and more.
                                        These items may be produced by several brands, designers, or manufacturers.</span>
                                    <span class="shop-now float-left w-100"><a href="#"
                                            class="d-inline-block align-top float-none btn-primary">Shop Now</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End 2 banners -->

            <!-- Products and Testimonials -->
            <div id="main">
                <!-- Products sections -->
                <div id="hometab" class="home-tab my-40 my-sm-25 bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="row">
                            <div class="tt-title d-inline-block float-none w-100 text-center">Trending Products</div>
                            <div class="tabs">
                                <ul class="nav nav-tabs justify-content-center">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                            href="#ttfeatured-main" id="featured-tab">
                                            <div class="tab-title">Featured</div>
                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ttnew-main"
                                            id="new-tab">
                                            <div class="tab-title">Latest</div>
                                        </a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ttbestseller-main"
                                            id="bestseller-tab">
                                            <div class="tab-title">Bestseller</div>
                                        </a></li>
                                </ul>
                            </div>

                            <!--First row-->

                            <div class="main-content w-100 float-left">
                                <div class="container">
                                    <div class="row">
                                        <div class="content-wrapper filter-toggle col-xl-12 col-lg-12 order-lg-2">

                                            {{-- <div class="filter-toggle-main w-100 float-left">
                                                <div class="sidebar-filter-toggle left-sidebar w-100 float-left">

                                                    <div id="sidebar-main" class="sidebar-main">

                                                        <div class="sidebar-block price col-sm-4 float-left">
                                                            <h3 class="widget-title"><a data-toggle="collapse"
                                                                    href="#price" role="button" aria-expanded="true"
                                                                    aria-controls="price">Price</a></h3>
                                                            <div id="price" class="collapse show">
                                                                <div class="price-inner">
                                                                    <label for="amount">Price range:</label>
                                                                    <input type="text" id="amount" readonly
                                                                        style="border:0; font-weight:bold; background:none;">
                                                                    <div id="slider-range"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="sidebar-block color col-sm-4 float-left">
                                                            <h3 class="widget-title"><a data-toggle="collapse"
                                                                    href="#color" role="button" aria-expanded="true"
                                                                    aria-controls="color">Color</a></h3>
                                                            <div id="color"
                                                                class="sidebar-widget-option-wrapper collapse show">
                                                                <div class="color-inner">
                                                                    <div class="sidebar-widget-option">
                                                                        <a href="#"
                                                                            style="background-color: #000000;"></a>
                                                                        Black <span>(4)</span>
                                                                    </div>
                                                                    <div class="sidebar-widget-option">
                                                                        <a href="#"
                                                                            style="background-color: #11426b;"></a>
                                                                        Blue <span>(3)</span>
                                                                    </div>
                                                                    <div class="sidebar-widget-option">
                                                                        <a href="#"
                                                                            style="background-color: #7d5a3c;"></a>
                                                                        Brown <span>(3)</span>
                                                                    </div>
                                                                    <div class="sidebar-widget-option">
                                                                        <a href="#"
                                                                            style="background-color: #ffffff;"></a>
                                                                        White <span>(3)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sidebar-block size col-sm-4 float-left">
                                                            <h3 class="widget-title"><a data-toggle="collapse"
                                                                    href="#size" role="button" aria-expanded="true"
                                                                    aria-controls="size">Size</a></h3>
                                                            <div id="size"
                                                                class="sidebar-widget-option-wrapper collapse show">
                                                                <div class="size-inner">
                                                                    <div class="sidebar-widget-option">
                                                                        <input type="checkbox" id="size-1">
                                                                        <label for="size-1">L <span>(4)</span></label>
                                                                    </div>
                                                                    <div class="sidebar-widget-option">
                                                                        <input type="checkbox" id="size-2">
                                                                        <label for="size-2">XS <span>(3)</span></label>
                                                                    </div>
                                                                    <div class="sidebar-widget-option">
                                                                        <input type="checkbox" id="size-3">
                                                                        <label for="size-3">S <span>(3)</span></label>
                                                                    </div>
                                                                    <div class="sidebar-widget-option">
                                                                        <input type="checkbox" id="size-4">
                                                                        <label for="size-4">Xl <span>(3)</span></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="tab-content text-center products w-100 float-left">
                                                <div class="tab-pane grid fade active" id="grid" role="tabpanel">
                                                    <div class="row">
                                                        <div class="product-layouts col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                            <div class="product-thumb">
                                                                <div class="image zoom">
                                                                    <a href="product-details.html">
                                                                        <img src="{{ asset('assets/img/products/pro1.jpeg') }}"
                                                                            alt="01" />
                                                                        <img src="{{ asset('assets/img/products/pro1.jpeg') }}"
                                                                            alt="02"
                                                                            class="second_image img-responsive" /> </a>
                                                                </div>
                                                                <div class="thumb-description">
                                                                    <div class="caption">
                                                                        <h4 class="product-title text-capitalize"><a
                                                                                href="product-details.html">aliquam quaerat
                                                                                voluptatem</a></h4>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div
                                                                            class="product-ratings d-inline-block align-middle">
                                                                            <span class="fa fa-stack"><i
                                                                                    class="material-icons">star</i></span>
                                                                            <span class="fa fa-stack"><i
                                                                                    class="material-icons">star</i></span>
                                                                            <span class="fa fa-stack"><i
                                                                                    class="material-icons">star</i></span>
                                                                            <span class="fa fa-stack"><i
                                                                                    class="material-icons off">star</i></span>
                                                                            <span class="fa fa-stack"><i
                                                                                    class="material-icons off">star</i></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="price">
                                                                        <div class="regular-price">$100.00</div>
                                                                        <div class="old-price">$150.00</div>
                                                                    </div>
                                                                    <div class="button-wrapper">
                                                                        <div class="button-group text-center">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-cart"
                                                                                data-target="#cart-pop"
                                                                                data-toggle="modal"><i
                                                                                    class="material-icons">shopping_cart</i><span>Out
                                                                                    of stock</span></button>
                                                                            <a href="wishlist.html"
                                                                                class="btn btn-primary btn-wishlist"><i
                                                                                    class="material-icons">favorite</i><span>wishlist</span></a>
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-compare"><i
                                                                                    class="material-icons">equalizer</i><span>Compare</span></button>
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-quickview"
                                                                                data-toggle="modal"
                                                                                data-target="#product_view"><i
                                                                                    class="material-icons">visibility</i><span>Quick
                                                                                    View</span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade list text-left" id="list" role="tabpanel">
                                                    <div class="product-layouts col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="product-thumb row">
                                                            <div class="image zoom col-xs-12 col-sm-5 col-md-4">
                                                                <a href="product-details.html"
                                                                    class="d-block position-relative">
                                                                    <img src="{{ asset('assets/img/products/01.jpg') }}"
                                                                        alt="01" />
                                                                    <img src="{{ asset('assets/img/products/02.jpg') }}"
                                                                        alt="02"
                                                                        class="second_image img-responsive" />
                                                                </a>
                                                            </div>
                                                            <div
                                                                class="thumb-description col-xs-12 col-sm-7 col-md-8 position-static text-left">
                                                                <div class="caption">
                                                                    <h4 class="product-title text-capitalize"><a
                                                                            href="product-details.html">aliquam quaerat
                                                                            voluptatem</a></h4>
                                                                </div>
                                                                <div class="rating mb-10">
                                                                    <div
                                                                        class="product-ratings d-inline-block align-middle">
                                                                        <span class="fa fa-stack"><i
                                                                                class="material-icons">star</i></span>
                                                                        <span class="fa fa-stack"><i
                                                                                class="material-icons">star</i></span>
                                                                        <span class="fa fa-stack"><i
                                                                                class="material-icons">star</i></span>
                                                                        <span class="fa fa-stack"><i
                                                                                class="material-icons off">star</i></span>
                                                                        <span class="fa fa-stack"><i
                                                                                class="material-icons off">star</i></span>
                                                                    </div>
                                                                </div>

                                                                <div class="description">
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                    Proin rhoncus arcu turpis, quis sagittis orci dictum
                                                                    non. Etiam id eleifend erat. Donec sit amet nisl id nisi
                                                                    laoreet viverra in ac nibh. </div>

                                                                <div class="price">
                                                                    <div class="regular-price">$100.00</div>
                                                                    <div class="old-price">$150.00</div>
                                                                </div>
                                                                <div
                                                                    class="color-option d-flex align-items-center float-left w-100">
                                                                    <ul class="color-categories">
                                                                        <li>
                                                                            <a class="tt-pink" href="#"
                                                                                title="Pink"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="tt-blue" href="#"
                                                                                title="Blue"></a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="tt-yellow" href="#"
                                                                                title="Yellow"></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="button-wrapper">
                                                                    <div class="button-group text-center">
                                                                        <button type="button"
                                                                            class="btn btn-primary btn-cart"
                                                                            data-target="#cart-pop" data-toggle="modal"
                                                                            disabled="disabled"><i
                                                                                class="material-icons">shopping_cart</i><span>out
                                                                                of stock</span></button>
                                                                        <a href="wishlist.html"
                                                                            class="btn btn-primary btn-wishlist"><i
                                                                                class="material-icons">favorite</i><span>wishlist</span></a>
                                                                        <button type="button"
                                                                            class="btn btn-primary btn-compare"><i
                                                                                class="material-icons">equalizer</i><span>Compare</span></button>
                                                                        <button type="button"
                                                                            class="btn btn-primary btn-quickview"
                                                                            data-toggle="modal"
                                                                            data-target="#product_view"><i
                                                                                class="material-icons">visibility</i><span>Quick
                                                                                View</span></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade sort text-left" id="sort-view"
                                                        role="tabpanel">
                                                        <div class="product-layouts">
                                                            <div class="product-thumb row">
                                                                <div class="image zoom col-xs-12 col-sm-3 col-md-2">
                                                                    <a href="product-details.html"
                                                                        class="d-block position-relative">
                                                                        <img src="{{ asset('assets/img/products/01.jpg') }}"
                                                                            alt="01" />
                                                                        <img src="{{ asset('assets/img/products/02.jpg') }}"
                                                                            alt="02"
                                                                            class="second_image img-responsive" />
                                                                    </a>

                                                                </div>
                                                                <div
                                                                    class="thumb-description col-xs-12 col-sm-9 col-md-10 position-static text-left">
                                                                    <div class="sort-title col-md-5 col-sm-7 float-left">
                                                                        <div class="caption">
                                                                            <h4 class="product-title text-capitalize"><a
                                                                                    href="product-details.html">aliquam
                                                                                    quaerat voluptatem</a></h4>
                                                                        </div>

                                                                        <div class="rating mb-10">
                                                                            <div
                                                                                class="product-ratings d-inline-block align-middle">
                                                                                <span class="fa fa-stack"><i
                                                                                        class="material-icons">star</i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="material-icons">star</i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="material-icons">star</i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="material-icons off">star</i></span>
                                                                                <span class="fa fa-stack"><i
                                                                                        class="material-icons off">star</i></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="description mb-10">
                                                                            Lorem ipsum dolor sit amet, consectetur
                                                                            adipiscing
                                                                            elit. Proin rhoncus arcu turpis, quis sagittis
                                                                            orci
                                                                            dictum non. Etiam id eleifend erat. Donec sit
                                                                            amet
                                                                            nisl id nisi laoreet viverra in ac nibh. </div>
                                                                        <div
                                                                            class="color-option d-flex align-items-center float-left w-100">
                                                                            <ul class="color-categories">
                                                                                <li>
                                                                                    <a class="tt-pink" href="#"
                                                                                        title="Pink"></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="tt-blue" href="#"
                                                                                        title="Blue"></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a class="tt-yellow" href="#"
                                                                                        title="Yellow"></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="price-main col-md-3 col-sm-5 float-left text-center text-sm-center text-xs-left">
                                                                        <div class="price">
                                                                            <div class="regular-price">$100.00</div>
                                                                            <div class="old-price">$150.00</div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="button-wrapper col-md-4 col-sm-5 float-left text-center text-md-center text-sm-center text-xs-left">
                                                                        <div class="button-group text-center">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-cart"
                                                                                data-target="#cart-pop"
                                                                                data-toggle="modal" disabled="disabled"><i
                                                                                    class="material-icons">shopping_cart</i><span>out
                                                                                    of stock</span></button>
                                                                            <a href="wishlist.html"
                                                                                class="btn btn-primary btn-wishlist"><i
                                                                                    class="material-icons">favorite</i><span>wishlist</span></a>
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-compare"><i
                                                                                    class="material-icons">equalizer</i><span>Compare</span></button>
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-quickview"
                                                                                data-toggle="modal"
                                                                                data-target="#product_view"><i
                                                                                    class="material-icons">visibility</i><span>Quick
                                                                                    View</span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--End first row-->

                                <!-- Featured -->
                                <div class="tab-pane active float-left w-100" id="ttfeatured-main" role="tabpanel"
                                    aria-labelledby="featured-tab">
                                    <section id="ttfeatured" class="ttfeatured-products">
                                        <div class="ttfeatured-content products grid owl-carousel" id="owl1">
                                            <div class="product-layouts">
                                                <div class="product-thumb">
                                                    <div class="image zoom">
                                                        <a href="product-details.html">
                                                            <img src="{{ asset('assets/img/products/01.jpg') }}"
                                                                alt="01" height="501" width="385" />
                                                            <img src="{{ asset('assets/img/products/02.jpg') }}"
                                                                alt="02" class="second_image img-responsive"
                                                                height="501" width="385" /> </a>
                                                    </div>
                                                    <div class="thumb-description">
                                                        <div class="caption">
                                                            <h4 class="product-title text-capitalize"><a
                                                                    href="product-details.html">Merino Small Dress</a></h4>
                                                        </div>
                                                        <div class="rating">
                                                            <div class="product-ratings d-inline-block align-middle">
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons off">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons off">star</i></span>
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="regular-price">$100.00</div>
                                                            <div class="old-price">$150.00</div>
                                                        </div>
                                                        <div class="button-wrapper">
                                                            <div class="button-group text-center">
                                                                <button type="button" class="btn btn-primary btn-cart"
                                                                    data-target="#cart-pop" data-toggle="modal"
                                                                    disabled="disabled"><i
                                                                        class="material-icons">shopping_cart</i><span>Add
                                                                        to cart</span></button>
                                                                <a href="wishlist.html"
                                                                    class="btn btn-primary btn-wishlist"><i
                                                                        class="material-icons">favorite</i><span>wishlist</span></a>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-compare"><i
                                                                        class="material-icons">equalizer</i><span>Compare</span></button>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-quickview"
                                                                    data-toggle="modal" data-target="#product_view"><i
                                                                        class="material-icons">visibility</i><span>Quick
                                                                        View</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- End featured -->

                                <!-- New -->
                                <div class="tab-pane float-left w-100" id="ttnew-main" role="tabpanel"
                                    aria-labelledby="new-tab">
                                    <section id="ttnew" class="ttnew-products">
                                        <div class="ttnew-content products grid owl-carousel" id="owl2">
                                            <div class="product-layouts">
                                                <div class="product-thumb">
                                                    <div class="image zoom">
                                                        <a href="product-details.html">
                                                            <img src="{{ asset('assets/img/products/01.jpg') }}"
                                                                alt="01" height="501" width="385" />
                                                            <img src="{{ asset('assets/img/products/02.jpg') }}"
                                                                alt="02" class="second_image img-responsive"
                                                                height="501" width="385" /> </a>
                                                    </div>
                                                    <div class="thumb-description">
                                                        <div class="caption">
                                                            <h4 class="product-title text-capitalize"><a
                                                                    href="product-details.html">Printed Dugaree with
                                                                    T-Shirt</a></h4>
                                                        </div>
                                                        <div class="rating">
                                                            <div class="product-ratings d-inline-block align-middle">
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons off">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons off">star</i></span>
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="regular-price">$100.00</div>
                                                            <div class="old-price">$150.00</div>
                                                        </div>
                                                        <div class="button-wrapper">
                                                            <div class="button-group text-center">
                                                                <button type="button" class="btn btn-primary btn-cart"
                                                                    data-target="#cart-pop" data-toggle="modal"
                                                                    disabled="disabled"><i
                                                                        class="material-icons">shopping_cart</i><span>Add
                                                                        to cart</span></button>
                                                                <a href="wishlist.html"
                                                                    class="btn btn-primary btn-wishlist"><i
                                                                        class="material-icons">favorite</i><span>wishlist</span></a>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-compare"><i
                                                                        class="material-icons">equalizer</i><span>Compare</span></button>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-quickview"
                                                                    data-toggle="modal" data-target="#product_view"><i
                                                                        class="material-icons">visibility</i><span>Quick
                                                                        View</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- End new -->

                                <!-- Bestseller -->
                                <div class="tab-pane float-left w-100" id="ttbestseller-main" role="tabpanel"
                                    aria-labelledby="bestseller-tab">
                                    <section id="ttbestseller" class="ttbestseller-products">
                                        <div class="ttbestseller-content products grid owl-carousel" id="owl3">
                                            <div class="product-layouts">
                                                <div class="product-thumb">
                                                    <div class="image zoom">
                                                        <a href="product-details.html">
                                                            <img src="{{ asset('assets/img/products/01.jpg') }}"
                                                                alt="01" height="501" width="385" />
                                                            <img src="{{ asset('assets/img/products/02.jpg') }}"
                                                                alt="02" class="second_image img-responsive"
                                                                height="501" width="385" /> </a>
                                                    </div>
                                                    <div class="thumb-description">
                                                        <div class="caption">
                                                            <h4 class="product-title text-capitalize"><a
                                                                    href="product-details.html">Slim-fit Leaf-Print Linen
                                                                    Shirt</a></h4>
                                                        </div>

                                                        <div class="rating">
                                                            <div class="product-ratings d-inline-block align-middle">
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons off">star</i></span>
                                                                <span class="fa fa-stack"><i
                                                                        class="material-icons off">star</i></span>
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="regular-price">$100.00</div>
                                                            <div class="old-price">$150.00</div>
                                                        </div>
                                                        <div class="button-wrapper">
                                                            <div class="button-group text-center">
                                                                <button type="button" class="btn btn-primary btn-cart"
                                                                    data-toggle="modal" data-target="#product_view"
                                                                    disabled="disabled"><i
                                                                        class="material-icons">shopping_cart</i><span>Add
                                                                        to cart</span></button>
                                                                <a href="wishlist.html"
                                                                    class="btn btn-primary btn-wishlist"><i
                                                                        class="material-icons">favorite</i><span>wishlist</span></a>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-compare"><i
                                                                        class="material-icons">equalizer</i><span>Compare</span></button>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-quickview"
                                                                    data-toggle="modal" data-target="#product_view"><i
                                                                        class="material-icons">visibility</i><span>Quick
                                                                        View</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- End bestseller -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Products -->

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
                                <div class="product-layouts">
                                    <div class="product-thumb">
                                        <div class="image zoom">
                                            <a href="#">
                                                <img src="{{ asset('assets/img/products/01.jpg') }}" alt="01"
                                                    height="501" width="385" />
                                                <img src="{{ asset('assets/img/products/02.jpg') }}" alt="02"
                                                    class="second_image img-responsive" height="501" width="385" />
                                            </a>
                                        </div>
                                        <div class="thumb-description">
                                            <div class="caption">
                                                <h4 class="product-title text-capitalize"><a
                                                        href="product-details.html">Checked
                                                        Polo Collar T-shirt</a>
                                                </h4>
                                            </div>
                                            <div class="rating">
                                                <div class="product-ratings d-inline-block align-middle">
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                    <span class="fa fa-stack"><i
                                                            class="material-icons off">star</i></span>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <div class="regular-price">$100.00</div>
                                                <div class="old-price">$150.00</div>
                                            </div>
                                            <div class="button-wrapper">
                                                <div class="button-group text-center">
                                                    <button type="button" class="btn btn-primary btn-cart"
                                                        data-toggle="modal" data-target="#product_view"
                                                        disabled="disabled"><i
                                                            class="material-icons">shopping_cart</i><span>Add to
                                                            cart</span></button>
                                                    <a href="wishlist.html" class="btn btn-primary btn-wishlist"><i
                                                            class="material-icons">favorite</i><span>wishlist</span></a>
                                                    <button type="button" class="btn btn-primary btn-compare"><i
                                                            class="material-icons">equalizer</i><span>Compare</span></button>
                                                    <button type="button" class="btn btn-primary btn-quickview"
                                                        data-toggle="modal" data-target="#product_view"><i
                                                            class="material-icons">visibility</i><span>Quick
                                                            View</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Special Products -->

                <!-- Brands -->
                <div id="ttbrandlogo" class="my-40 my-sm-25 bottom-to-top hb-animate-element">
                    <div class="container">
                        <div class="tt-brand owl-carousel">
                            <div class="item">
                                <a href="#"><img src="{{ asset('assets/img/logos/brand-logo-01.png') }}"
                                        alt="brand-logo-01" width="140" height="100"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Brands -->
            </div>
        </div>
    </main>
@endsection
