@extends('layouts.app')
@section('content')
    <main id="category" class="category">
        <nav aria-label="breadcrumb" class="w-100 float-left">
            <ol class="breadcrumb parallax justify-content-center"
                data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
                style="background-image: url('{{ asset('assets/img/banner/parellex-bg.jpg') }}'); background-position: 50% 0.809717%;">
                <h2 class="wow fadeInUp mb-15" data-wow-duration="1.1s" data-wow-delay=".1s" style="color: whitesmoke">
                    ALL ITEMS
                </h2>
            </ol>
        </nav>
        <div class="main-content w-100 float-left ">
            <div class="container m-auto">

                <div class="row ">
                    <div class="content-wrapper m-auto col-xl-9 col-lg-9 order-lg-2">
                        <header class="product-grid-header d-flex d-xs-block d-sm-flex d-lg-flex w-100 float-left">
                            <div
                                class="hidden-sm-down total-products d-flex d-xs-block d-lg-flex col-md-3 col-sm-3 col-xs-12 align-items-center">
                                <h6 class="text-center">Showing {{ $productCount }} results</h6>
                            </div>
                            <div
                                class="shop-results-wrapper d-flex d-sm-flex d-xs-block d-lg-flex justify-content-end col-md-9 col-sm-9 col-xs-12">
                                <div class="shop-results d-flex align-items-center"><span>Sort By</span>
                                    <div class="shop-select sort">
                                        <select name="sortList" id="sortList" onchange="handleSort(this)"
                                            data-selected-sort="{{ $selectedSort }}">
                                            <option value="latest">Latest products</option>
                                            <option value="high_to_low">Price High to Low</option>
                                            <option value="low_to_high">Price Low to High</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="tab-content text-center products w-100 float-left">
                            <div class="tab-pane grid fade active" id="grid" role="tabpanel">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="product-layouts col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                            <div class="product-thumb">
                                                <div class="image zoom">
                                                    <a href="product-details.html">

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
                                                                href="product-details.html">{{ $product->product_name }}</a>
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
                                                        <div class="old-price">${{ $product->product_cut_price }}
                                                        </div>
                                                    </div>
                                                    <div class="button-wrapper">
                                                        <div class="button-group text-center">
                                                            <button type="button" class="btn btn-primary btn-cart"
                                                                <?php if ($product->product_stock === 0): ?> disabled <?php endif; ?>
                                                                data-target="#cart-pop" data-toggle="modal"><i
                                                                    class="material-icons">shopping_cart</i><span>Add
                                                                    to cart</span></button>

                                                            <button type="button" class="btn btn-primary btn-quickview"
                                                                data-toggle="modal" data-target="#product_view"><i
                                                                    class="material-icons">visibility</i><span>Quick
                                                                    View</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @forelse ($products as $product)
                                    @empty
                                        <h5 class="text-center">No products found.</h5>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script>
        function handleSort(select) {
            var selectedValue = select.value;
            var baseUrl = window.location.origin + window.location.pathname;
            var queryParams = new URLSearchParams(window.location.search);

            // Remove existing sort parameter
            queryParams.delete('sort');

            if (selectedValue !== 'latest') {
                queryParams.set('sort', selectedValue);
            }

            var newUrl = baseUrl + '?' + queryParams.toString();
            window.location.href = newUrl;
        }
        var selectElement = document.getElementById('sortList');
        var selectedSort = selectElement.getAttribute('data-selected-sort');


        // Function to set selected option based on value
        function setSelectedOption(selectElement, value) {
            for (var i = 0; i < selectElement.options.length; i++) {
                if (selectElement.options[i].value === value) {
                    selectElement.options[i].selected = true;
                    break;
                }
            }
        }

        // Call the function to set selected option
        setSelectedOption(selectElement, '{{ $selectedSort }}');
    </script>
@endsection
