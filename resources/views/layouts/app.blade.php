<!DOCTYPE html>
<html lang="en">

<head>
    <title>PoshMarkTrading</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Women Wholesale dresses">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,900" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl-carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lightbox.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
</head>

<body>

    <!-- Header -->
    <header class="header-area text-center header-default">
        <div class="header-main">
            <div class="header-nav">
                <div class="container">
                    <div class="nav-left float-left">
                        <div class="ttheader-service">Want to explore Upcoming Deals on Weekends?</div>
                    </div>
                    <div class="nav-right float-right d-flex">
                        <div class="ttheader-mail"><a
                                href="mailto:poshmarktradinguk@gmail.com">poshmarktradinguk@gmail.com</a></div>
                    </div>
                </div>
            </div>
            <div class="header-main-head">

                <div class="header-main">
                    <div class="container">
                        <div class="header-left float-left d-flex d-lg-flex d-md-block d-xs-block">
                            <div class="language-wrapper toggle">
                                <button type="button" class="btn text-capitalize"><img
                                        src="{{ asset('assets/img/banner/en.png') }}" alt="en" height="12"
                                        width="18" /><span>English</span></button>
                            </div>
                            <div class="currency-wrapper toggle">
                                <button type="button" class="btn text-capitalize"><span>£ British Pound</span></button>
                            </div>
                            <div class="contact">
                                <i class="material-icons" style="color: #666">phone</i>
                                <a href="tel:+447534300611">+447534300611</a>
                            </div>
                        </div>
                        <div class="header-middle float-lg-left float-md-left float-sm-left float-xs-none">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logos/logoo.png') }}"
                                        alt="logo" width="180" height="40" class="logo"></a>
                            </div>
                        </div>
                        <div class="header-right d-flex d-xs-flex d-sm-flex justify-content-end float-right">
                            <div class="search-wrapper">
                                <a>
                                    <i class="material-icons search" style="padding-top: 14px;">search</i>
                                    <i class="material-icons close">close</i> </a>
                                <form autocomplete="off" action="{{ route('search') }}" method="GET" id="searchForm"
                                    class="search-form">
                                    <div class="autocomplete">
                                        <input id="myInput" type="text" name="term" placeholder="Search here">
                                        <button type="submit"><i class="material-icons"
                                                style="color: black">search</i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="wishlist cart-wrapper">
                                <a href="{{ route('wishlist.index') }}">
                                    <button type="button" class="btn">
                                        <i class="material-icons">favorite</i><span
                                            class="ttcount">{{ \App\Http\Controllers\WishlistController::wishlistCount() }}</span>
                                    </button></a>
                            </div>
                            <div class="cart-wrapper">
                                <a href="{{ url('/cart') }}">
                                    <button type="button" class="btn">

                                        <i class="material-icons" style="padding-top: 13px;">shopping_cart</i>
                                        <span class="ttcount">{{ Cart::getTotalQuantity() }}</span></button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu">
                    <div class="container">
                        <!-- Navbar (Desktop) -->
                        <nav class="navbar navbar-expand-lg navbar-light d-sm-none d-xs-none d-lg-block navbar-full">

                            <!-- Navbar brand -->
                            <a class="navbar-brand text-uppercase d-none" href="#">Navbar</a>

                            <!-- Collapse button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Collapsible content -->
                            <div class="collapse navbar-collapse">

                                <!-- Links -->
                                <ul class="navbar-nav m-auto justify-content-center">
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link  text-uppercase" href="{{ route('products.new') }}">
                                            NEW IN
                                            <span class="sr-only">(current)</span> </a>
                                    </li>
                                    <li class="nav-item dropdown mega-dropdown">
                                        <a class="nav-link dropdown-toggle text-uppercase" href="#">CLOTHING</a>
                                        <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3">
                                            <div class="row">
                                                <div class="col-md-12 col-xl-4 sub-menu mb-xl-0 mb-4">
                                                    <!-- <h6 class="sub-title text-uppercase font-weight-bold white-text">Variation 1</h6> -->
                                                    <ul class="list-unstyled">
                                                        @php
                                                            $categories = \App\Models\Category::orderBy(
                                                                'created_at',
                                                                'asc',
                                                            )->get();
                                                        @endphp
                                                        @if (count($categories) > 0)

                                                            @foreach ($categories as $category)
                                                                @if ($category->category_column == 0)
                                                                    <li>
                                                                        <a class="menu-item pl-0 text-uppercase"
                                                                            href="{{ route('category.by_category', $category->slug) }}">
                                                                            {{ $category->category_name }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-xl-4 sub-menu mb-md-0 mb-4">
                                                    <!-- <h6 class="sub-title text-uppercase font-weight-bold white-text">Variation 2</h6> -->
                                                    <ul class="list-unstyled">
                                                        @foreach ($categories as $category)
                                                            @if ($category->category_column != 0)
                                                                <li>
                                                                    <a class="menu-item pl-0 text-uppercase"
                                                                        href="{{ route('category.by_category', $category->slug) }}">
                                                                        {{ $category->category_name }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <p>No categories found.</p>
                                                        @endif

                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-xl-4 sub-menu mb-0">

                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span class="menu-banner"><img
                                                                    src="{{ asset('assets/img/banner/menu-banner.jpg') }}"
                                                                    alt="menu-banner" width="161"
                                                                    height="230" /></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase"
                                            href="{{ route('shop.more', ['filter' => 'italy']) }}">
                                            MADE IN ITALY
                                            <span class="sr-only">(current)</span> </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase"
                                            href="{{ route('shop.more', ['filter' => 'autumn']) }}">AUTUMN/WINTER</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase"
                                            href="{{ route('shop.more', ['filter' => 'spring']) }}">SPRING/SUMMER</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase"
                                            href="{{ route('shop.more', ['filter' => 'accessories']) }}">ACCESSORIES</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase" href="{{ url('/contact') }}">CONTACT
                                            US</a>
                                    </li>



                                </ul>
                                <!-- Links -->
                            </div>
                            <!-- Collapsible content -->

                        </nav>
                        <!-- Navbar (Mobile) -->
                        <nav class="navbar navbar-expand-lg navbar-light d-lg-none navbar-responsive">

                            <!-- Navbar brand -->
                            <a class="navbar-brand text-uppercase d-none" href="#">Navbar</a>

                            <!-- Collapse button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class='material-icons'
                                        style="color: #666">sort</i></span>
                            </button>

                            <!-- Collapsible content -->
                            <div class="collapse navbar-collapse" id="navbarSupportedContent2">

                                <!-- Links -->
                                <ul class="navbar-nav m-auto justify-content-center">

                                    <!-- Features -->
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link  text-uppercase" href="category.html">
                                            NEW IN
                                            <span class="sr-only">(current)</span> </a>

                                    </li>
                                    <li class="nav-item dropdown mega-dropdown">
                                        <a class="nav-link dropdown-toggle text-uppercase" data-toggle="collapse"
                                            data-target="#menu3" aria-controls="menu3" aria-expanded="false"
                                            aria-label="Toggle navigation" href="#">CLOTHING</a>
                                        <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3"
                                            id="menu3">
                                            <div class="row">
                                                <div class="col-md-12 col-xl-4 sub-menu mb-xl-0 mb-4">
                                                    <!-- <h6 class="sub-title text-uppercase font-weight-bold white-text">Variation 1</h6> -->

                                                    <ul class="list-unstyled">
                                                        @php
                                                            $categories = \App\Models\Category::orderBy(
                                                                'created_at',
                                                                'asc',
                                                            )->get();
                                                        @endphp
                                                        @if (count($categories) > 0)

                                                            @foreach ($categories as $category)
                                                                @if ($category->category_column == 0)
                                                                    <li>
                                                                        <a class="menu-item pl-0 text-uppercase"
                                                                            href="{{ route('category.by_category', $category->slug) }}">
                                                                            {{ $category->category_name }}
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-md-6 col-xl-4 sub-menu mb-md-0 mb-4">
                                                    <!-- <h6 class="sub-title text-uppercase font-weight-bold white-text">Variation 2</h6> -->
                                                    <ul class="list-unstyled">
                                                        @foreach ($categories as $category)
                                                            @if ($category->category_column != 0)
                                                                <li>
                                                                    <a class="menu-item pl-0 text-uppercase"
                                                                        href="{{ route('category.by_category', $category->slug) }}">
                                                                        {{ $category->category_name }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <p>No categories found.</p>
                                                        @endif

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase"
                                            href="{{ route('shop.more', ['filter' => 'italy']) }}">
                                            MADE IN ITALY
                                            <span class="sr-only">(current)</span> </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase"
                                            href="{{ route('shop.more', ['filter' => 'autumn']) }}">AUTUMN/WINTER</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase"
                                            href="{{ route('shop.more', ['filter' => 'spring']) }}">SPRING/SUMMER</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase"
                                            href="{{ route('shop.more', ['filter' => 'accessories']) }}">ACCESSORIES</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link  text-uppercase" href="{{ url('/contact') }}">CONTACT
                                            US</a>
                                    </li>
                                </ul>
                                <!-- Links -->
                            </div>
                            <!-- Collapsible content -->

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main body -->
    @yield('content')

    <!-- Footer -->
    <div class="block-newsletter">
        <div class="parallax" data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
            style="background-image:url(img/banner/parallax.jpg); background-position:50% 65.8718%;">
            <div class="container">
                <div class="tt-newsletter col-sm-7">
                    <h2 class="text-uppercase">Subscribe to our Newsletter</h2>
                </div>
                <div class="block-content col-sm-5">
                    <form method="post" action="contact-us.html">
                        <div class="input-group">
                            <input type="email" name="email" value="" placeholder="Email address.."
                                required="" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-theme text-uppercase btn-primary"
                                    type="submit">Subscribe</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer font-small footer-default">
        <div class="container text-center text-md-left">
            <div class="row">
                <div class="col-md-2 footer-cms footer-column">
                    <div class="ttcmsfooter">
                        <div class="footer-logo"><img src="{{ asset('assets/img/logos/logowhite.png') }}"
                                alt="footer-logo" width="200" height="50"></div>
                        <div class="footer-desc">A fashion brand for men and women. Top quality products.</div>
                    </div>
                </div>
                <div class="col-md-3 footer-column">
                    <div class="title">
                        <a href="#products" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse"
                            aria-expanded="false">Company</a>
                    </div>
                    <ul id="products" class="list-unstyled collapse">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/about') }}">about us</a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}">contact us</a>
                        </li>
                    </ul>

                </div>
                <div class="col-md-3 footer-column">
                    <div class="title">
                        <a href="#company" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse"
                            aria-expanded="false">Products</a>
                    </div>
                    <ul id="company" class="list-unstyled collapse">
                        <li>
                            <a href="{{ url('/wishlist') }}">Wishlist</a>
                        </li>
                        <li>
                            <a href="{{ route('products.new') }}">New Products</a>
                        </li>
                        <li>
                            <a href="{{ route('products.all') }}">All Collection</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 footer-column">
                    <div class="title">
                        <a href="#information" class="font-weight-normal text-capitalize mb-10"
                            data-toggle="collapse" aria-expanded="false">store information</a>
                    </div>
                    <ul id="information" class="list-unstyled collapse">
                        <li class="contact-detail links">
                            <span class="address">
                                <span class="icon"><i class="material-icons"
                                        style="padding-top: 4px;">location_on</i></span>
                                <span class="data"> 34 Broughton Street, Manchester , United Kingdom</span> </span>
                        </li>
                        <li class="links">
                            <span class="contact">
                                <span class="icon"><i class="material-icons">phone</i></span>
                                <span class="data"><a href="tel:+447534300611">+447534300611</a></span> </span>
                        </li>
                        <li class="links">
                            <span class="email">
                                <span class="icon"><i class="material-icons">email</i></span>
                                <span class="data"><a
                                        href="mailto:poshmarktradinguk@gmail.com">poshmarktradinguk@gmail.com</a></span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-bottom-wrap">
            <div class="container">
                <div class="row">
                    <div class="footer-copyright text-center py-3">
                        © 2024 by PoshMarkTrading.com
                    </div>
                </div>
            </div>
        </div>
        <a href="#" id="goToTop" title="Back to top" class="btn-primary"><i class="material-icons arrow-up"
                style="line-height: 1.5">keyboard_arrow_up</i></a>


    </footer>
    <!-- Cookies -->
    <div class="alert text-center cookiealert" role="alert">
        <b>Do you like cookies?</b> We use cookies to ensure you get the best experience on our website. <a
            href="https://demo.templatetrip.com/Html/HTML001_victoria/" rel="noreferrer">learn more</a>

        <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
            I agree
        </button>
    </div>

    <!-- Scripts -->
    <script>
        document.getElementById('myInput').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                document.getElementById('searchForm').submit();
            }
        });
    </script>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/parallax.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox-2.6.min.js') }}"></script>
    <script src="{{ asset('assets/js/ResizeSensor.min.js') }}"></script>
    <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/inview.js') }}"></script>
    <script src="{{ asset('assets/js/cookiealert.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.lazy.min.js') }}"></script>
</body>

</html>
