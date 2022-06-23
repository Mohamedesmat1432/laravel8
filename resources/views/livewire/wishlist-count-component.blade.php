@if (Cart::instance('wishlist')->count() > 0)
    <li class="nav-item">
        <a class="nav-link color text-danger hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/wishlist'))) ? 'active' : '' }}" href="{{route('product.wishlist')}}">
            {{__('messages.Wishlist')}} <i class="bi-heart"></i>
            <span class="badge badge-danger">{{Cart::instance('wishlist')->count()}}</span>
        </a>
    </li>
@else
    <li class="nav-item ">
        <a class="nav-link color text-danger hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/wishlist'))) ? 'active' : '' }}" href="{{route('product.wishlist')}}">
            {{__('messages.Wishlist')}}<i class="bi-heart"></i>
        </a>
    </li>
@endif

