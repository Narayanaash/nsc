<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    @yield('facebook-meta-tag')
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="NSC Stationery Supplies is the best Stationery Supplier in Pretoria Laudium , Gauteng South Africa.">
    <meta name="title" content="Top Stationery Supplier in Africa | South Africa | Best Online Store | Hardware Store">
    @yield('meta-tags')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/img/favicon.png')}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/meanmenu.min.css')}}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-all.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
    <!-- FlatIcon CSS -->
    <link rel="stylesheet" href="{{asset('frontend/font/flaticon.css')}}">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
    <!-- popup -->
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <!-- OwlCerousel CSS -->
    <link rel="stylesheet" href="{{asset('frontend/vendor/OwlCarousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/vendor/OwlCarousel/owl.carousel.min.css')}}">
    <!-- Nivo Slider CSS -->
    <link rel="stylesheet" href="{{asset('frontend/vendor/slider/css/nivo-slider.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <!-- mine custom css -->
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    @stack('css')
    <!-- Modernize js -->
    <script src="{{asset('frontend/js/modernizr-3.7.1.min.js')}}"></script>
    <!-- fb share script -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=318843728990066&autoLogAppEvents=1"></script>

</head>

<body class="sticky-header pace-done">
     <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->
    <!-- ScrollUp Start Here -->
    <a href="#wrapper" data-type="section-switch" class="scrollup">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <!-- ScrollUp End Here -->
    <div id="wrapper" class="wrapper">
        <!--<div class="call-mobile d-block d-sm-none">-->
        <!--    <div class="float-right">-->
        <!--        <ul>-->
        <!--            <li><a href="tel: +27847861721">CALL US <i class="fa fa-phone"></i></a></li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Add your site or application content here -->
        <!-- Header Area Start Here -->
        <header class="header">
            <div id="header-topbar" class="bg-Primary py-2">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <div class="header-topbar-layout1">
                                <div class="header-top-left">
                                    <ul>
                                        <li>
                                            @if(Auth::guard('customer')->check())
                                            @php 
                                                $address = App\Address::where("user_id", Auth::guard('customer')->user()->id)->first();
                                                $count = App\Address::where("user_id", Auth::guard('customer')->user()->id)->count();
                                            @endphp
                                                @if($count > 1)
                                                    <i class="fas fa-map-marker-alt"></i><span>Address:</span>{{$address->landmark}}, {{$address->city}}, {{$address->street_address}} - {{$address->zip}}</li>
                                                @else
                                                    <i class="fas fa-map-marker-alt"></i><span>Address: No address found
                                                @endif
                                            @else
                                                <i class="fas fa-map-marker-alt"></i><span>Address: No address found
                                            @endif
                                        <!--<li><i class="far fa-clock"></i><span>Business Hours:</span> Mon-Fri: 08:00 am - 05:00 pm</li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-end">
                            <div class="header-topbar-layout1">
                                <div class="header-top-right">
                                    <ul>
                                        <li><i class="fas fa-share-alt"></i>Follow Us:</li>
                                        <li class="social-icon">
                                            <a href="https://web.facebook.com/NSC-Stationery-109732830731589/?modal=admin_todo_tour" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://twitter.com/NscStationery" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.instagram.com/nscstationery/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <!--<a href="#" target="_blank"><i class="fab fa-youtube"></i></a>-->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="rt-sticky-placeholder"></div>
            <div id="header-menu" class="header-menu menu-layout1">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-area">
                                <a href="{{route('frontend.home')}}" class="temp-logo">
                                    <img src="{{asset('frontend/img/nsc_logo.png')}}" alt="logo" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 d-flex position-static">
                            <nav id="dropdown" class="template-main-menu">
                                <ul>
                                   <li class="{{ (request()->is('home')) ? 'active' : ((request()->is('/')) ? 'active' : '' ) }}">
                                        <a href="{{route('frontend.home')}}">Home</a>
                                    </li>
                                    <li class="{{ (request()->is('buy*')) ? 'active' : ((request()->is('product-search*')) ? 'active' : '' ) }}">
                                        <a href="{{route('frontend.category')}}">Product</a>
                                    </li>
                                    <li class="{{ (request()->is('about')) ? 'active' : '' }}">
                                        <a href="{{route('about')}}">About Us</a>
                                    </li>
                                    <li class="{{ (request()->is('promotion')) ? 'active' : '' }}">
                                        <a href="{{route('promotion')}}">Promotion</a>
                                    </li>
                                    <li class="{{ (request()->is('contact')) ? 'active' : '' }}">
                                        <a href="{{route('contact')}}">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-5 d-flex justify-content-end">
                            <div class="header-action-layout1">
                                <ul>
                                    <li class="custom-header-search" style="line-height: 0;">
                                        <form action="#" id="search-form-ajax" class="relative">
                                            <input type="text" value="{{$query ?? ''}}" placeholder="search here...">
                                            <div class="animated-loading"></div>
                                            <i class="fa fa-times-circle" style="font-size:20px"></i>
                                        </form>
                                        <div class="custom-search-result">
                                            <div class="container">
                                                <div id="dynamic-result" class="row">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="cart-li">
                                        <a class="cart-btn" href="{{route('frontend.cart')}}" title="Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                        <span class="badge">{{ count((array) session('cart')) }}</span>
                                    </li>
                                    @if(Auth::guard('customer')->check())
                                    <li class="relative">
                                        <a class="cart-btn my-account" href="#!" title="Profile"><i class="fa fa-user" aria-hidden="true"></i></a>
                                        <div class="dropDownBox hidden">
                                            <div class="carrot"></div>
                                            <ul class="border-bottom">
                                                <li>
                                                   <a href="{{route('frontend.cart')}}"> Cart ({{ count((array) session('cart')) }})</a>
                                                </li>
                                                <li><a href="{{route('frontend.userprofile')}}"> Profile</a></li>
                                            <li><a href="{{route('frontend.quotation')}}">Quotation </a></li>
                                            </ul>
                                            <a href="{{ route('customer.logout') }}" class="btn btn-danger" title="Logout"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a>
                                            <form id="frm-logout" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </li>
                                    @else
                                    <li class="relative">
                                        <a class="cart-btn my-account" href="#!"><i class="fa fa-user" aria-hidden="true"></i></a>
                                        <div class="dropDownBox hidden">
                                            <div class="carrot"></div>
                                            <ul class="border-bottom">
                                                <li>
                                                   <a href="cart.php"> Cart ({{ count((array) session('cart')) }})</a>
                                                </li>
                                            </ul>
                                            <a href="{{route('customer.login')}}" class="btn btn-danger login-btn2" title="Login">Login</a>
                                            <div class="text-center sign-up-cart">
                                                New to NSC ? <a href="{{route('frontend.register')}}">Sign Up</a>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    <li class="header-btn">
                                        <a href="tel: 012/3741594" class="item-btn"><i class="fas fa-phone"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Area End Here -->