<header>
    <div class="header_main py-3">
        <div class="container-fluid">
            <div class="row">
                <!-- Logo -->
                <div class="col-lg-3 col-sm-3 col-3 order-1 text-right h3">
                    <div class="logo_container">
                        <div class="logo">
                            <a href="#">
                                <span style="color: #000">{{__('messages.E-commerce')}}</span>
                                <span style=" color:#ddad54"> - {{__('messages.elgamal')}} </span>
                            </a>
                        </div>
                    </div>
                </div> <!-- Search -->
                <div class="col-lg-5 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="{{route('product.search')}}">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control item" value="{{$search}}"  placeholder="{{__('messages.Search')}}..."/>
                                        <div class="input-group-append">
                                            <select class="form-control">
                                                <option value="level-0">{{__('messages.Categories')}}</option>
                                                @foreach ($categories as $category)
                                                    <option class="level-1" value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="product_cat" value="{{$product_cat}}" id="product-cat"/>
                                            <input type="hidden" name="product_cat_id" value="{{$product_cat_id}}" id="product-cat-id"/>
                                            <input type="hidden" class="link-control" value="{{str_split($product_cat,12)[0]}}"/>
                                        </div>
                                        <button type="submit" class="btn btn-success">{{__('messages.Search')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                            @livewire('wishlist-count-component')
                        </div> <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                @livewire('cart-count-component')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg  navbar-dark" style="background: #9e0101" >
    <div class="container px-3 px-lg-5">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav  mb-2 mb-lg-0 ms-lg-2">
                <li class="nav-item">
                    <a class="nav-link hvr-grow {{(request()->is(LaravelLocalization::setLocale())) ? 'active' : '' }} " aria-current="page"  href="/">{{__('messages.Home')}} {{--<i class="bi bi-house-door-fill"></i>--}}</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/shop'))) ? 'active' : '' }}" href="{{route('product.shop')}}">
                        {{__('messages.Shop')}}
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/checkout'))) ? 'active' : '' }}" href="{{route('product.checkout')}}">{{__('messages.Checkout')}}</a></li>
                <li class="nav-item mx-3"><a class="nav-link hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/contact'))) ? 'active' : '' }}" href="{{route('contact')}}">{{__('messages.Contact')}}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hvr-grow {{((request()->is('en/#'))) ? 'active' : '' }}" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{__('messages.Language')}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li><i class="bi bi-flag-united-states"></i>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item" style="margin: {{__('messages.l')}}">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->utype === 'ADM')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle bold" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{Auth::user()->name}}</a>
                                        <ul class="dropdown-menu {{__('messages.text')}}" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#!">{{__('messages.All Edit')}}</a></li>
                                            <li><hr class="dropdown-divider" /></li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/dashboard'))) ? 'active' : '' }}" href="{{route('admin.dashboard')}}"><i class="bi bi-bar-chart-fill"></i>  {{__('messages.Dashboard')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/category'))) ? 'active' : '' }}" href="{{route('admin.categories')}}"><i class="bi bi-archive-fill"></i>  {{__('messages.All Categories')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/products'))) ? 'active' : '' }}" href="{{route('admin.products')}}"><i class="bi bi-card-list"></i> {{__('messages.All Products')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/slider'))) ? 'active' : '' }}" href="{{route('admin.homesliders')}}"><i class="bi bi-sliders"></i>  {{__('messages.Manage Home Sliders')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/home-categories'))) ? 'active' : '' }}" href="{{route('admin.homecategories')}}"><i class="bi bi-inbox-fill"></i> {{__('messages.Manage Home Categories')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/sale'))) ? 'active' : '' }}" href="{{route('admin.sale')}}"><i class="bi bi-calendar3"></i> {{__('messages.Manage Sale Date')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/coupon'))) ? 'active' : '' }}" href="{{route('admin.coupon')}}"><i class="bi bi-sticky-fill"></i> {{__('messages.All Coupons')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/orders'))) ? 'active' : '' }}" href="{{route('admin.orders')}}"><i class="bi bi-graph-up"></i> {{__('messages.All Orders')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/contact-us'))) ? 'active' : '' }}" href="{{route('admin.contact')}}"><i class="bi bi-person-lines-fill"></i> {{__('messages.Contact Messages')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/settings'))) ? 'active' : '' }}" href="{{route('admin.settings')}}"><i class="bi bi-gear-fill"></i> {{__('messages.Settings')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/admin/product-attribute'))) ? 'active' : '' }}" href="{{route('admin.productAttribute')}}"><i class="bi bi-stack"></i>  {{__('messages.product Attribute')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-left"></i> {{__('messages.Logout')}}</a>
                                            </li>
                                            <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{__('messages.User')}} ({{Auth::user()->name}})</a>
                                        <ul class="dropdown-menu {{__('messages.text')}}" aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="dropdown-item" href="#!">{{__('messages.All Edit')}}</a>
                                            </li>
                                            <li><hr class="dropdown-divider" /></li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/user/dashboard'))) ? 'active' : '' }}" href="{{ route('user.dashboard')}}"><i class="bi bi-bar-chart-fill"></i> {{__('messages.Dashboard')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/user/orders'))) ? 'active' : '' }}" href="{{ route('user.orders')}}"><i class="bi bi-graph-up"></i> {{__('messages.All Orders')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/user/changepassword'))) ? 'active' : '' }}" href="{{ route('user.changepassword')}}"><i class="bi bi-shield-lock-fill"></i> {{__('messages.Change Password')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/user/profile'))) ? 'active' : '' }}" href="{{ route('user.profile')}}"><i class="bi bi-person-circle"></i> {{__('messages.My Profile')}}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item hvr-grow" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-left"></i> {{__('messages.Logout')}}</a>
                                            </li>
                                            <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item" style="margin: {{__('messages.l')}}">
                                    <a class="nav-link hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/login'))) ? 'active' : '' }}" href="{{route('login')}}">{{__('messages.Login')}}</a>
                                </li>
                                <li class="nav-item mr-3">
                                    <a class="nav-link  hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/register'))) ? 'active' : '' }}" href="{{route('register')}}">{{__('messages.Register')}}</a>
                                </li>
                            @endif
                        @endif
                        {{-- <li class="nav-item">
                            <a class="nav-link hvr-grow" id="flip"><i class="bi bi-search h4"></i></a>
                        </li> --}}
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>


<style>
    .btn,.form-control{
        border-radius: 0;
    }

</style>



