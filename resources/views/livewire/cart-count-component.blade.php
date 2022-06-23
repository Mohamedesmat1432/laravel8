@if(Cart::instance('cart')->count() > 0)
    <li class="nav-item">
        <a class="nav-link color color2 text-primary hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/cart'))) ? 'active' : '' }}" href="{{route('product.cart')}}">
            {{__('messages.Cart')}} <i class="bi bi-cart3 cart-icon"></i>  <span class="badge badge-primary ">{{Cart::instance('cart')->count()}}</span>
        </a>
    </li>
@else
    <li class="nav-item ">
        <a class="nav-link color color2 text-primary hvr-grow {{((request()->is(LaravelLocalization::setLocale().'/cart'))) ? 'active' : '' }}" href="{{route('product.cart')}}">
            {{__('messages.Cart')}} <i class="bi bi-cart3 cart-icon" ></i>
        </a>
    </li>
@endif
