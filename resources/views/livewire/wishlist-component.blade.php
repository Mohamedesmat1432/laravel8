@section('title','Whishlist Page')

<section>
        <div class="container p-5" >
            @if(Cart::instance('wishlist')->content()->count() > 0)
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb px-4 py-3">
                        <li class="breadcrumb-item"><a href="/">{{__('messages.Home')}}</a></li>
                        <li class="breadcrumb-item"><a href="/shop">{{__('messages.Shop')}}</a></li>
                        <li class="breadcrumb-item active bold" aria-current="page">{{__('messages.Wishlist')}}</li>
                    </ol>
                </nav>
                <div class="card">
                    <h5 class="card-header bold">{{__('messages.List Of Wishlist')}}</h5>
                    <div class="card-body">
                        <div class="row gx-2 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            @foreach(Cart::instance('wishlist')->content() as $item)
                                <div class="col mt-3">
                                    <div class="card">
                                        <!-- Product image-->
                                        <a href="{{route('product.details',['slug'=>$item->model->slug])}}">
                                            <img class="w-100" height="150" src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}" />
                                        </a>
                                        <!-- Product details-->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h6 class="fw-bolder">{{$item->model->name}}</h6>
                                                <!-- Product reviews-->
                                                <div class="d-flex justify-content-center small text-warning mb-2">
                                                    <div class="bi-star-fill"></div>
                                                    <div class="bi-star-fill"></div>
                                                    <div class="bi-star-fill"></div>
                                                    <div class="bi-star-fill"></div>
                                                    <div class="bi-star-fill"></div>
                                                </div>
                                                <div class="product-wish">
                                                    <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="bi-heart-fill fill-star"></i></a>
                                                </div>
                                                <!-- Product price-->
                                                @if ($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <span> ${{$item->model->sale_price}}</span>
                                                    <del><span> ${{$item->model->regular_price}}</span></del>
                                                @else
                                                    <span>${{$item->model->regular_price}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            {{-- <div class="text-center">
                                                @if ($item->model->sale_price > 0  && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <button class="btn btn-card  rounded bold" wire:click.prevent="store('{{$item->model->id}}','{{$item->model->name}}','{{$item->model->sale_price}}')">
                                                        {{__('messages.Add to cart')}}
                                                        <i class="bi bi-cart3"></i>
                                                    </button>
                                                @else
                                                    <button class="btn btn-card rounded bold" wire:click.prevent="store('{{$item->model->id}}','{{$item->model->name}}','{{$item->model->regular_price}}')">
                                                        {{__('messages.Add to cart')}}
                                                        <i class="bi bi-cart3"></i>
                                                    </button>
                                                @endif
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class=" text-center" style="padding: 8% 0">
                    <h1>{{__('messages.Whishlist Is Empty')}}</h1>
                    <p>{{__('messages.No Product In Whishlist')}}</p>
                    <a href="/shop" class="btn btn-outline-danger rounded bold">{{__('messages.Choose Now')}}</a>
                </div>
            @endif
        </div>
</section>




