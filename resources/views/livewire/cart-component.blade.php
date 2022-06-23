@section('title','Cart Page')


<div class="card-list" >
    <div class="container p-5" >
        @if (Cart::instance('cart')->count() > 0)
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb px-4 py-3">
                    <li class="breadcrumb-item"><a href="/">{{__('messages.Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="/shop">{{__('messages.Shop')}}</a></li>
                    <li class="breadcrumb-item active bold" aria-current="page">{{__('messages.Cart')}}</li>
                </ol>
            </nav>

            <div class="row p-3">
                <div class="message">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="icon">
                                <i class="bi bi-check"></i>
                            </div>
                            <strong>Success!</strong>
                            {{Session::get('success_message')}}
                        </div>
                    @endif
                    @if(Session::has('delete_message'))
                        <div class="alert alert-danger alert-dismissible alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="icon">
                                <i class="bi bi-x-circle"></i>
                            </div>
                            <strong>Success!</strong>
                            {{Session::get('delete_message')}}
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    @if (Cart::instance('cart')->count() > 0)
                    <div class="card">
                        {{-- <h5 class="card-header bold">{{__('messages.List for products cart')}}</h5> --}}
                        <div class="card-body py-2">
                            @foreach (Cart::instance('cart')->content() as $item)
                            <div class="row" >
                                <div class="col-md-4 text-center">
                                    <a href="{{route('product.details',['slug'=>$item->model->slug])}}">
                                        <img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}" height="120" >
                                    </a>
                                </div>
                                <div class="col-md-4 my-2">
                                    <p><b>{{__('messages.Name')}}: </b>{{$item->model->name}}</p>
                                    <p>
                                        @foreach ($item->options as $key => $value)
                                            <b>{{$key}}: </b>{{$value}}
                                        @endforeach
                                    </p>
                                    @if ($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <p><b>{{__('messages.Price')}}: </b>${{$item->model->sale_price}} <del><span>${{$item->model->regular_price}}</span></del></p>
                                        <p><b>{{__('messages.Subtotal')}}: </b>${{$item->subtotal}}</p>
                                    @else
                                        <p><b>{{__('messages.Price')}}: </b>${{$item->model->regular_price}}</p>
                                        <p><b>{{__('messages.Subtotal')}}: </b>${{$item->subtotal}}</p>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <p class="quantity bg-white mt-3">
                                        <a href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="bi bi-dash-circle-fill text-primary"></i></a>
                                        <input type="text" name="product-quantity" value="{{$item->qty}}" style="width:20%; text-align:center" class="mx-2"/>
                                        <a wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="bi bi-plus-circle-fill text-primary"></i></a>
                                        <a class="{{__('messages.m')}}-2 text-danger" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="bi bi-x-lg"></i></a>
                                        <a class=" text-danger d-block mt-3" wire:click.prevent="switchSavedForLater('{{$item->rowId}}')">{{__('messages.Save For Later')}}</a>
                                    </p>
                                </div>
                            </div>
                            <hr class="m-2">
                            @endforeach
                            <button class="btn btn-danger rounded bold {{__('messages.float')}}" wire:click.prevent="destroyAll()">{{__('messages.Remove All')}}</button>
                        </div>
                    </div>
                    <div class="coupon-code">
                        @if (Session::has('coupon_message'))
                            <div class="alert alert-danger alert-dismissible alert-white rounded">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <div class="icon">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                                <strong>Wrong!</strong>
                                {{Session::get('coupon_message')}}
                            </div>
                        @endif
                        @if (!Session::has('coupon'))
                        <div class="checkbox-field my-3 bold {{__('messages.text')}}">
                            <input type="checkbox" value="1" wire:model="haveCouponCode"> <span>{{__('messages.I have coupon code')}}</span>
                        </div>
                        @endif
                        @if ($haveCouponCode == 1)
                            <div class="card mb-3">
                                <h5 class="card-header bold {{__('messages.text')}}">{{__('messages.Coupon Code')}}</h5>
                                <div class="card-body">
                                    <form wire:submit.prevent="applyCoupon">
                                        <div class="form-group">
                                            <input type="text" placeholder="{{__('messages.Enter Your Coupon Code')}}" class="form-control rounded" wire:model="couponCode" >
                                        </div>
                                        <button class="btn btn-outline-primary rounded bold {{__('messages.float')}}" type="submit">{{__('messages.Apply')}}</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    @else
                        <div class="alert alert-danger alert-dismissible alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="icon">
                                <i class="bi bi-x-circle"></i>
                            </div>
                            <strong>Success!</strong>
                            {{__('messages.No Product In Cart')}}
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header bold {{__('messages.text')}}">{{__('messages.Total Cash')}}</h5>
                        <div class="card-body">
                            <div>
                                <p><b>{{__('messages.Subtotal')}}:  </b><span class="pull-right">${{Cart::instance('cart')->subtotal()}}</span></p>
                                @if (Session::has('coupon'))
                                    <p><b>{{__('messages.Discount')}}: ({{Session::get('coupon')['code']}})</b> <span>${{number_format($discount,2)}}</span>
                                        <a wire:click.prevent="removeCoupon"><i class="bi bi-x-lg"></i></a>
                                    </p>
                                    <p><b>{{__('messages.Subtotal With Discount')}}: </b> <span class="pullright">${{number_format($subtotalAfterDiscount,2)}}</span></p>
                                    <p><b>{{__('messages.Tax')}}: ({{config('cart.tax')}}%)</b> <span>${{number_format($taxAfterDiscount,2)}}</span><p>
                                    <hr class="mt-3 text-dark">
                                    <p><b>{{__('messages.Total With Discount')}}:</b> ${{number_format($totalAfterDiscount,2)}}</p>
                                @else
                                    <p><b>{{__('messages.Tax')}}: </b> ${{Cart::instance('cart')->tax()}}</p>
                                    <hr class="mt-3 text-dark">
                                    <p><b>{{__('messages.Total')}}: </b> ${{Cart::instance('cart')->total()}}</p>
                                @endif
                            </div>
                            <button class="btn btn-outline-success w-100 rounded bold" wire:click.prevent="checkout">{{__('messages.Checkout')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class=" text-center" style="padding: 8% 0">
                <h1>{{__('messages.Cart Is Empty')}}</h1>
                <p>{{__('messages.add new item now')}}</p>
                <a href="/shop" class="btn btn-card rounded bold">{{__('messages.Shop Now')}}</a>
            </div>
        @endif
        @if (Cart::instance('savedForLater')->count() > 0)
        <div class="row mt-3 px-3">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header {{__('messages.text')}} bold">{{__('messages.List For saved Later Item')}}({{Cart::instance('savedForLater')->count() }} )</h5>
                    <div class="card-body">
                        @foreach (Cart::instance('savedForLater')->content() as $item)
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <a href="{{route('product.details',['slug'=>$item->model->slug])}}">
                                        <img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}" height="120"/>
                                    </a>
                                </div>
                                <div class="col-md-4 my-">
                                    <p><b>Name: </b>{{$item->model->name}}</p>
                                    @if ($item->model->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <p><b>{{__('messages.Price')}}: </b>${{$item->model->sale_price}}</p>
                                        <p><b>{{__('messages.Subtotal')}}: </b>${{$item->subtotal}}</p>
                                    @else
                                        <p><b>{{__('messages.Price')}}: </b>${{$item->model->regular_price}}</p>
                                        <p><b>{{__('messages.Subtotal')}}: </b>${{$item->subtotal}}</p>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="quantity-input bg-white my-5">
                                        <a class="mr-3 text-secondary" wire:click.prevent="moveSavedToCart('{{$item->rowId}}')">{{__('messages.Move To Cart')}}</a>
                                        <a class="text-danger" wire:click.prevent="deleteFromSavedForLater('{{$item->rowId}}')"><i class="bi bi-x-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                            <hr class="m-2">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header bold">Note :</h5>
                    <div class="card-body">
                        <p class="text-center">This list save selected item to see this items for time later</p>
                        <i class="bi bi-heart-fill text-danger"></i>
                        <i class="bi bi-heart-fill text-danger"></i>
                        <i class="bi bi-heart-fill text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class=" save-for-later mt-5">
                @if(Session::has('save_cart_message'))
                    <div class="alert alert-success alert-dismissible alert-white rounded">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="icon">
                            <i class="bi bi-check"></i>
                        </div>
                        <strong>Success!</strong>
                        {{Session::get('save_cart_message')}}
                    </div>
                @endif
            </div>
            {{-- <div class="alert alert-danger alert-dismissible alert-white rounded">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="icon">
                    <i class="bi bi-x-circle"></i>
                </div>
                <strong>Success!</strong>
                {{__('messages.No Products Saved For Later')}}
            </div> --}}
        @endif
    </div>
</div>
<style>
    p{
        text-align: center;
    }
</style>
