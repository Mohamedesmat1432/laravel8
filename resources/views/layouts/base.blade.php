<!DOCTYPE html>
<html lang="{{__('messages.en')}}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> @yield('title','Base Page')</title>
        <!-- Favicon-->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.1.1/css/hover-min.css" integrity="sha512-SJw7jzjMYJhsEnN/BuxTWXkezA2cRanuB8TdCNMXFJjxG9ZGSKOX5P3j03H6kdMxalKHZ7vlBMB4CagFP/de0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" integrity="sha512-KRrxEp/6rgIme11XXeYvYRYY/x6XPGwk0RsIC6PyMRc072vj2tcjBzFmn939xzjeDhj0aDO7TDMd7Rbz3OEuBQ==" crossorigin="anonymous" /> --}}

        <!-- Bootstrap icons-->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
        @livewireStyles
    </head>
    <body >
        <!-- Navigation-->


        {{-- <header id="header" class="header header-style-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="primary-nav-section">
                        <div class="container">
                            <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                                <li class="menu-item home-icon">
                                    <a class="link-term mercado-item-title" href="/"><i class="fa fa-home" aria-hidden="true"></i>{{__('messages.Home')}}</a>
                                </li>
                                <li class="menu-item ">
                                    <a class="link-term mercado-item-title" href="{{route('product.shop')}}">{{__('messages.Shop')}}</a>
                                </li>
                                @livewire('cart-count-component')
                                @livewire('wishlist-count-component')
                                <li class="menu-item ">
                                    <a class="link-term mercado-item-title" href="{{route('product.checkout')}}">{{__('messages.Checkout')}}</a>
                                </li>
                                <li class="menu-item ">
                                    <a class="link-term mercado-item-title" href="{{route('contact')}}">{{__('messages.Contact Us')}}</a>
                                </li>
                                @if(Route::has('login'))
									@auth
										@if(Auth::user()->utype === 'ADM')
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" >My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{route('admin.dashboard')}}">{{__('messages.Dashboard')}}</a>
													</li>
													<li class="menu-item">
														<a title="Categories" href="{{route('admin.categories')}}"> {{__('messages.All Categories')}}</a>
													</li>
													<li class="menu-item">
														<a title="Products" href="{{route('admin.products')}}">{{__('messages.All Products')}}</a>
													</li>
													<li class="menu-item">
														<a title="Manage Home Slider" href="{{route('admin.homesliders')}}">{{__('messages.Manage Home Sliders')}}</a>
													</li>
													<li class="menu-item">
														<a title="Manage Home Categories" href="{{route('admin.homecategories')}}">{{__('messages.Manage Home Categories')}}</a>
													</li>
													<li class="menu-item">
														<a title="Sale Date" href="{{route('admin.sale')}}">{{__('messages.Manage Sale Date')}}</a>
													</li>
                                                    <li class="menu-item">
                                                        <a title="All Coupons" href="{{route('admin.coupon')}}">{{__('messages.All Coupons')}}</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="All Orders" href="{{route('admin.orders')}}">{{__('messages.All Orders')}}</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Contact Messages" href="{{route('admin.contact')}}">{{__('messages.Contact Messages')}}</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a title="Settings" href="{{route('admin.settings')}}">{{__('messages.Settings')}}</a>
                                                    </li>
													<li class="menu-item">
														<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('messages.Logout')}}</a>
													</li>
													<form id="logout-form" method="POST" action="{{ route('logout') }}">
														@csrf
													</form>
												</ul>
											</li>
										@else
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{route('user.dashboard')}}">{{__('messages.Dashboard')}}</a>
													</li>
                                                    <li class="menu-item" >
														<a title="Dashboard" href="{{ route('user.orders')}}">{{__('messages.All Orders')}}</a>
													</li>
                                                    <li class="menu-item" >
														<a title="Dashboard" href="{{ route('user.changepassword')}}">{{__('messages.Change Password')}}</a>
													</li>
													<li class="menu-item">
														<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('messages.Logout')}}</a>
													</li>

													<form id="logout-form" method="POST" action="{{ route('logout') }}">
														@csrf
													</form>
												</ul>
											</li>
										@endif
									@else
										<li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">{{__('messages.Login')}}</a></li>
										<li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">{{__('messages.Register')}}</a></li>
									@endif
								@endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header> --}}
        <!-- Header-->

        @livewire('header-component')
        <!-- Section-->
        <div  style="height: 100%;">
            {{$slot}}
        </div>
        <!-- Footer-->
        @livewire('footer-component')
        <!-- Bootstrap core JS-->
        <!-- Bootstrap core JS-->
        {{-- <script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js" integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg==" crossorigin="anonymous"></script> --}}


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js" integrity="sha512-jWNpWAWx86B/GZV4Qsce63q5jxx/rpWnw812vh0RE+SBIo/mmepwOSQkY2eVQnMuE28pzUEO7ux0a5sJX91g8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.tiny.cloud/1/hmi4gavv259q0z0cubjg4u2o35c72wz3wtbyg606yly23n85/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.min.js" integrity="sha512-FkM4ZGExuYz4rILLbNzw8f3HxTN9EKdXrQYcYfdluxJBjRLthYPxxZixV/787qjN3JLs2607yN5XknR/cQMU8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Core theme JS-->
        <script src="{{asset('assets/js/countdown.min.js')}}"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{-- <script>
            $(document).ready(function() {
                $(".navbar-expand-sm .collapse .navbar-nav .nav-item .nav-link").click(function(v) {
                    v.preventDefault();
                    $(this).addClass("active").parent().siblings().find("a").removeClass("active");

                });
            });
        </script> --}}

        @livewireScripts
        @stack('scripts')
    </body>
</html>
