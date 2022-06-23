{{--<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
--}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> @yield('title','BasePage')</title>
        <!-- Favicon-->
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css" integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
        <style>
            .links {
                padding: 10px 0;
            }
        </style>
        @livewireStyles
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" style="height: 100%; background:rgb(33, 47, 79)">
            <div class="container px-4 px-lg-5">
                <b><a class="navbar-brand" href="/"><span style="color: #cca629">elgamal</span><span style="color: rgb(15, 10, 41)">E-commerce</span></a></b>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item mx-3"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('product.shop')}}">Shop</a></li>
                        @livewire('cart-count-component')
                        @livewire('wishlist-count-component')
                        <li class="nav-item"><a class="nav-link" href="{{route('product.checkout')}}">Checkout</a></li>
                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4 d-flex">
                        @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->utype === 'ADM')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Admin ({{Auth::user()->name}})</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                                            <li><hr class="dropdown-divider" /></li>
                                            <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                            <li><a class="dropdown-item" href="{{route('admin.categories')}}"> All Categories</a></li>
                                            <li><a class="dropdown-item" href="{{route('admin.products')}}"> All Products</a></li>
                                            <li><a class="dropdown-item" href="{{route('admin.homesliders')}}">Manage Home Sliders</a></li>
                                            <li><a class="dropdown-item" href="{{route('admin.homecategories')}}">Manage Home Categories</a></li>
                                            <li><a class="dropdown-item" href="{{route('admin.sale')}}">Manage Sale Date</a></li>
                                            <li><a class="dropdown-item" href="{{route('admin.coupon')}}">All Coupons</a></li>
                                            <li><a class="dropdown-item" href="{{route('admin.orders')}}">All Orders</a></li>
                                            <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                            <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> User ({{Auth::user()->name}})</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                                            <li><hr class="dropdown-divider" /></li>
                                            <li><a class="dropdown-item" href="{{ route('user.dashboard')}}">Dashboard</a></li>
                                            <li><a class="dropdown-item" href="{{ route('user.orders')}}">All Orders</a></li>
                                            <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                            <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        @livewire('header-component')
        <!-- Section-->
        <div class="bg-default" style="height: 100%; background:rgb(213, 213, 213)">
            {{$slot}}
        </div>
        <!-- Footer-->
        <footer class="py-5 " style="height: 100%; background:rgb(33, 47, 79)">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <!-- Bootstrap core JS-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/hmi4gavv259q0z0cubjg4u2o35c72wz3wtbyg606yly23n85/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js" integrity="sha512-jWNpWAWx86B/GZV4Qsce63q5jxx/rpWnw812vh0RE+SBIo/mmepwOSQkY2eVQnMuE28pzUEO7ux0a5sJX91g8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Core theme JS-->
        <script src="{{asset('assets/js/countdown.min.js')}}"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>



