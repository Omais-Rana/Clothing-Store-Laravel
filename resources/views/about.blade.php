@extends('layouts.app')
@section('content')
    <main id="about-us">
        <nav aria-label="breadcrumb" class="w-100 float-left">
            <ol class="breadcrumb parallax justify-content-center"
                data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
                style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
        <div class="main-content w-100 float-left">
            <div id="about-main-1" class="float-left w-100 mb-150 mb-sm-30">
                <div class="container">
                    <div class="row align-items-center about-main">
                        <div class="col-12 col-lg-5 text-center col-left">
                            <img src="{{ asset('assets/img/banner/about-us.jpg') }}" alt=""
                                class="border-radius-6 w-100" data-no-retina="" />
                        </div>
                        <div class="col-12 col-lg-7 col-right">
                            <span class="d-inline-block title mb-10">Don’t worry, you’re in safe hands.</span>
                            <h6 class="d-inline-block desc mb-30 font-weight-bold">
                                We are committed to our customers’ success from start to finish.
                                Our input helps make their solutions.
                            </h6>
                            <p class="m-0 sub-desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy
                                text ever since. Lorem Ipsum has been the industry's standard
                                dummy text ever since. Lorem Ipsum is printing and typesetting
                                simply dummy text.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="about-main-2" class="float-left w-100 mb-150 mb-sm-30">
                <div class="d-flex d-lg-flex d-sm-block d-xs-block align-items-center about-main-2 bg-light">
                    <div class="col-12 col-lg-6 col-right px-100">
                        <span class="d-inline-block title text-capitalize mb-150 text-center">some reason to work
                            together.</span>
                        <div class="row text-center text-md-left">
                            <!-- start feature box item-->
                            <div class="col-12 col-xl-6 col-lg-12 col-md-6 mb-30">
                                <div class="subtitle mb-10">
                                    <span class="title-no">01.</span>We believe in creativity
                                </div>
                                <p class="desc">
                                    Lorem Ipsum is simply text the printing and typesetting
                                    standard industry. Lorem Ipsum has been the industry's
                                    standard dummy text.
                                </p>
                            </div>
                            <!-- end feature box item-->
                            <!-- start feature box item-->
                            <div class="col-12 col-xl-6 col-lg-12 col-md-6 mb-30">
                                <div class="subtitle mb-10">
                                    <span class="title-no">02.</span>We believe in quality
                                </div>
                                <p class="desc">
                                    Lorem Ipsum is simply text the printing and typesetting
                                    standard industry. Lorem Ipsum has been the industry's
                                    standard dummy text.
                                </p>
                            </div>
                            <!-- end feature box item-->
                            <!-- start feature box item-->
                            <div class="col-12 col-xl-6 col-lg-12 col-md-6 mb-30">
                                <div class="subtitle mb-10">
                                    <span class="title-no">03.</span>We believe in abilities
                                </div>
                                <p class="desc">
                                    Lorem Ipsum is simply text the printing and typesetting
                                    standard industry. Lorem Ipsum has been the industry's
                                    standard dummy text.
                                </p>
                            </div>
                            <!-- end feature box item-->
                            <!-- start feature box item-->
                            <div class="col-12 col-xl-6 col-lg-12 col-md-6 mb-30">
                                <div class="subtitle mb-10">
                                    <span class="title-no">04.</span>We believe in relation
                                </div>
                                <p class="desc">
                                    Lorem Ipsum is simply text the printing and typesetting
                                    standard industry. Lorem Ipsum has been the industry's
                                    standard dummy text.
                                </p>
                            </div>
                            <!-- end feature box item-->
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 text-center col-left p-0">
                        <img src="{{ asset('assets/img/banner/about-us1.jpg') }}" alt=""
                            class="border-radius-6 w-100" data-no-retina="" />
                    </div>
                </div>
            </div>

            <div id="ttbrandlogo" class="my-40 my-sm-25 bottom-to-top hb-animate-element py-100 mb-150 py-sm-20 mb-sm-30">
                <div class="container">
                    <div class="tt-brand owl-carousel">
                        @foreach ($brand as $brand)
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
        </div>
    </main>
@endsection
