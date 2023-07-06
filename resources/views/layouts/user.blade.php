<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Surfside Media</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/imgs/theme/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/custom.css') }}">
    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    @php
        $categories=$item=App\Models\Category::all();
        $item=App\Models\Item::all();
        $order=App\Models\Product::inRandomOrder()->limit(2)->get();
        if (Auth::user()) {
            $orderCount=App\Models\Order::where('user_id',Auth::user()->id)->count();
        }else {
            $orderCount=0;
        }

        if (Auth::user()) {
            $cartCount=App\Models\Cart::where('user_id',Auth::user()->id)->count();
        }else {
            $cartCount=0;
        }

        if (Auth::user()) {
            $wishiltCount=App\Models\Wishilt::where('user_id',Auth::user()->id)->count();
        }else {
            $wishiltCount=0;
        }
    @endphp

    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ url('user/page') }}"><img src="{{ asset('user/assets/imgs/logo/logo.png') }}" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-1">
                            <form action="{{ url('search/product') }}" method="get">
                                @csrf
                                <input type="text" name="searchId" placeholder="Search for items...">
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="{{ url('wishilt/page') }}">
                                        <img class="svgInject" alt="Surfside Media" src="{{ asset('user/assets/imgs/theme/icons/icon-heart.svg') }}">
                                        <span class="pro-count blue">{{ $wishiltCount }}</span>
                                    </a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ url('cart/page') }}">
                                        <img alt="Surfside Media" src="{{ asset('user/assets/imgs/theme/icons/icon-cart.svg') }}">
                                        <span class="pro-count blue">{{ $orderCount }}</span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            @foreach ($order as $o)
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="{{ url('shop/detail',$o->id) }}"><img alt="Photo" src="{{ asset('storage/images/product_images/'.$o->product_image) }}"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="product-details.html">{{ $o->product_name }}</a></h4>
                                                    <h4><span>{{ $o->discount_price? $o->discount_price : $o->normal_price }}</span></h4>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-button">
                                                <a href="{{ url('cart/page') }}" class="outline">View cart</a>
                                                <a href="{{ url('order/page') }}">Checkout</a>
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
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{ url('user/page') }}"><img src="{{ asset('user/assets/imgs/logo/logo.png') }}" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                    @foreach ($categories as $c)
                                        <li class="has-children">
                                            <a href="{{ url('shop/category',$c->id) }}"><i class="surfsidemedia-font-dress"></i>{{ $c->category_name }}</a>
                                            <div class="dropdown-menu">
                                                <ul class="mega-menu d-lg-flex">
                                                    <li class="mega-menu-col col-lg-7">
                                                        <ul class="d-lg-flex">
                                                            <li class="mega-menu-col col-lg-4">
                                                                <ul>
                                                                    @if (App\Models\Item::where('category_id',$c->id))
                                                                        @php
                                                                            $i=App\Models\Item::where('category_id',$c->id)->get();
                                                                        @endphp
                                                                        @foreach ($i as $item)
                                                                            <li><a href="{{ url('shop/item',$item->id) }}"><i class="surfsidemedia-font-cpu"></i>{{ $item->item_name }}</a></li>
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="@yield('homePage')" href="{{ url('user/page') }}">Home </a></li>
                                    <li><a class="@yield('about')" href="{{ url('about/page') }}">About</a></li>
                                    <li><a class="@yield('shopPage')" href="{{ url('shop/page') }}">Shop</a></li>
                                    <li><a class="@yield('cart')" href="{{ url('cart/page') }}">Cart </a></li>
                                    <li><a class="@yield('order')" href="{{ url('order/page') }}">Order </a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class=" float-right d-none d-lg-block">

                        @if (Auth::user())
                            <form class="d-inline" action="{{ route('logout') }}" method="post">
                                @csrf
                                <div class="dropdown">
                                    <button class="btn btn-secondary p-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                       {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="{{ url('user-profile/page') }}">Profile</a></li>
                                      <li><input class="dropdown-item fs-6" type="submit" value="Log Out"></li>
                                    </ul>
                                  </div>
                            </form>
                        @else
                            <div class="d-flex">
                                <div class="me-2">
                                    <form action="{{ url('login') }}" method="get">
                                        @csrf
                                        <input class="btn" type="submit" value="Login">
                                    </form>
                                </div>
                                <div>
                                    <form action="{{ url('register') }}" method="get">
                                        @csrf
                                        <input class="btn" type="submit" value="Sign Up">
                                    </form>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{ url('wishilt/page') }}">
                                    <img class="svgInject" alt="Surfside Media" src="{{ asset('user/assets/imgs/theme/icons/icon-heart.svg') }}">
                                    <span class="pro-count blue">{{ $wishiltCount }}</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ url('order/page') }}">
                                    <img alt="Surfside Media" src="{{ asset('user/assets/imgs/theme/icons/icon-cart.svg') }}">
                                    <span class="pro-count white">{{ $orderCount }}</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{ url('shop/page') }}"><img src="{{ asset('user/assets/imgs/logo/logo.png') }}" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="{{ url('search/product') }}" method="get">
                        <input name="searchId" type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ url('user/page') }}">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ url('about/page') }}">About</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ url('shop/page') }}">Shop</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{ url('contact/page') }}">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    @auth
                    <div class="single-mobile-header-info">
                        <form action="logout" method="post">
                            @csrf
                            <input class="btn" type="submit" value="Logout">
                        </form>
                    </div>
                    @else
                        <div class="single-mobile-header-info">
                            <a href="{{ url('login') }}">Log In </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="{{ url('register') }}">Sign Up</a>
                        </div>
                    @endauth
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    @yield('user')

    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="{{ asset('user/assets/imgs/theme/icons/icon-email.svg') }}" alt="">
                                <h4 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h4>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>$25 coupon for first shopping.</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small" placeholder="Enter your email">
                            <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="{{ url('user/page') }}"><img src="{{ asset('user/assets/imgs/logo/logo.') }}png" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Address: </strong>Satthdow/Hmawbi/Yangon
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Phone: </strong>+95 9255075811
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>soenain2191997@gmail.com
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('user/assets/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{ url('cart/page') }}">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="{{ url('order/page') }}">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Install App</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">From App Store or Google Play</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active" src="{{ asset('user/assets/imgs/theme/app-store.jpg') }}" alt=""></a>
                                    <a href="#" class="hover-up"><img src="{{ asset('user/assets/imgs/theme/google-play.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Secured Payment Gateways</p>
                                <img class="wow fadeIn animated" src="{{ asset('user/assets/imgs/theme/payment-method.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">SurfsideMedia</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Vendor JS-->
<script src="{{ asset('user/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('user/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/slick.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ asset('user/assets/js/main.js?v=3.3') }}"></script>
<script src="{{ asset('user/assets/js/shop.js?v=3.3') }}"></script>

{{-- Toastr --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (Session::has('message'))
        <script>
            toastr.options={
                "progressBar":true,
                "closeButton":true,
            }
            toastr.success("{{ session::get('message') }}");
        </script>
    @endif

@yield('userJs')

</body>

</html>
