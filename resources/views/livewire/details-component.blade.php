@section('title','Details Page')

<div class="container p-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb px-4 py-3 mb-3">
            <li class="breadcrumb-item"><a href="/">{{__('messages.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="/shop">{{__('messages.Shop')}}</a></li>
            <li class="breadcrumb-item active bold" aria-current="page">{{__('messages.Details')}}</li>
        </ol>
    </nav>
    <div class="row px-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row  {{__('messages.text')}}">
                        <div class="col-md-4"  >
                            <div id="wrapper" wire:ignore>
                                <div id="main-image">
                                    <img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}" height="150" />
                                </div>
                                <div id="thumbs">
                                    <ul class="thumbs ">
                                        <li style="list-style-type: none;">
                                            @php
                                                $images = explode(",",$product->images);
                                            @endphp
                                            @foreach ($images as $image)
                                                @if ($image)
                                                    <a class="thumb" name="thumb" href="{{asset('assets/images/products')}}/{{$image}}">
                                                        <img src="{{asset('assets/images/products')}}/{{$image}}" alt="{{$product->name}}" width="60"/>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <p class="text-warning">
                                @php
                                    $avgrating = 0;
                                @endphp
                                @foreach ($product->orderItems->where('rstatus',1) as $orderItem)
                                @php
                                    $avgrating = $avgrating + $orderItem->review->rating;
                                @endphp
                                @endforeach
                                @for ($i = 1; $i < 5; $i++)
                                    @if ($i<=$avgrating)
                                        <i class="bi-star-fill"></i>
                                    @else
                                        <i class="bi-star text-gray"></i>
                                    @endif
                                @endfor
                                <a href="#" class="text-dark"> ({{$product->orderItems->where('rstatus',1)->count()}}) {{__('messages.review')}}</a>
                            </p>
                            <p><b>{{__('messages.Name')}} :</b> {{$product->name}}</p>
                            @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                <p>
                                    <b>{{__('messages.Price')}} :</b> <span> ${{$product->sale_price}}</span>
                                    <del><span> ${{$product->regular_price}}</span></del>
                                </p>
                            @else
                                <p><b>{{__('messages.Price')}} :</b> <span>${{$product->regular_price}}</span></p>
                            @endif
                            <p>{!!$product->short_description!!}</p>

                            @foreach ($product->attributeValues->unique('product_attribute_id') as $attr_value)
                                <label class="control-form bold">{{$attr_value->productAttribute->name}}</label>
                                <select class="form-control rounded" wire:model="sattr.{{$attr_value->productAttribute->name}}">
                                    <option value="0">Select {{$attr_value->productAttribute->name}}</option>
                                    @foreach ($attr_value->productAttribute->attributeValues->where('product_id',$product->id) as $pattr_val)
                                        <option value="{{$pattr_val->value}}">{{$pattr_val->value}}</option>
                                    @endforeach
                                </select>
                            @endforeach
                            <hr>
                            @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$product->id}}','{{$product->name}}','{{$product->sale_price}}')">
                                    {{__('messages.Add to cart')}}
                                    <i class="bi bi-cart3"></i>
                                </button>
                            @else
                                <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$product->id}}','{{$product->name}}','{{$product->regular_price}}')">
                                    {{__('messages.Add to cart')}}
                                    <i class="bi bi-cart3"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-3 mt-5 ">
        <div class="col-md-12">
            <div class="card {{__('messages.text')}}">
                <h3 class="card-header bold">{{__('messages.Popular Products')}}</h3>
                <div class="card-body">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mb-3">
                        @foreach ($popular_product as $p_product)
                        <div class="col mt-3">
                            <div class="card hvr-grow">
                                <!-- Product image-->
                                <a href="{{route('product.details',['slug' => $p_product->slug])}}">
                                    <img class="w-100" height="150" src="{{asset('assets/images/products')}}/{{$p_product->image}}" alt="{{$p_product->name}}" />
                                </a>
                                <!-- Product details-->
                                <div class="card-body">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h6 class="fw-bolder">{{$p_product->name}}</h6>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center h5 text-warning mb-2">
                                            @php
                                                $avgrating = 0;
                                            @endphp
                                            @foreach ($product->orderItems->where('rstatus',1) as $orderItem)
                                                @php
                                                    $avgrating = $avgrating + $orderItem->review->rating;
                                                @endphp
                                            @endforeach
                                            @for ($i = 1; $i < 5; $i++)
                                                @if ($i<=$avgrating)
                                                    <i class="bi-star-fill"></i>
                                                @else
                                                    <i class="bi-star text-gray"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <!-- Product price-->
                                        @if ($p_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <span> ${{$p_product->sale_price}}</span>
                                            <del><span> ${{$p_product->regular_price}}</span></del>
                                        @else
                                            <span>${{$p_product->regular_price}}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    {{-- <div class="text-center">
                                        @if ($p_product->sale_price > 0  && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$product->id}}','{{$product->name}}','{{$product->sale_price}}')">
                                                {{__('messages.Add to cart')}}
                                                <i class="bi bi-cart3"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$product->id}}','{{$product->name}}','{{$product->regular_price}}')">
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
        </div>
    </div>

    <div class="row px-3 mt-5">
        <div class="col-md-12">
            <div class="card {{__('messages.text')}}">
                <h3 class="card-header bold">{{__('messages.Related Products')}}</h3>
                <div class="card-body">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mb-3">
                        @foreach ($related_product as $r_product)
                        <div class="col mt-3">
                            <div class="card hvr-grow">
                                <!-- Product image-->
                                <a href="{{route('product.details',['slug' => $r_product->slug])}}">
                                    <img class="w-100" height="150" src="{{asset('assets/images/products')}}/{{$r_product->image}}" alt="{{$r_product->name}}" />
                                </a>
                                <!-- Product details-->
                                <div class="card-body">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h6 class="fw-bolder">{{$r_product->name}}</h6>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center h5 text-warning mb-2">
                                            @php
                                                $avgrating = 0;
                                            @endphp
                                            @foreach ($product->orderItems->where('rstatus',1) as $orderItem)
                                                @php
                                                    $avgrating = $avgrating + $orderItem->review->rating;
                                                @endphp
                                            @endforeach
                                            @for ($i = 1; $i < 5; $i++)
                                                @if ($i<=$avgrating)
                                                    <i class="bi-star-fill"></i>
                                                @else
                                                    <i class="bi-star text-gray"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <!-- Product price-->
                                        @if ($r_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <span> ${{$r_product->sale_price}}</span>
                                            <del><span> ${{$r_product->regular_price}}</span></del>
                                        @else
                                            <span>${{$r_product->regular_price}}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    {{-- <div class="text-center">
                                        @if ($r_product->sale_price > 0  && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                            <button class="btn btn-card mt-auto rounded" href="#" wire:click.prevent="store('{{$product->id}}','{{$product->name}}','{{$product->sale_price}}')">
                                                {{__('messages.Add to cart')}}
                                                <i class="bi bi-cart3"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-card mt-auto rounded" href="#" wire:click.prevent="store('{{$product->id}}','{{$product->name}}','{{$product->regular_price}}')">
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
        </div>
    </div>
</div>

<style>
    .gray{
        color: rgb(208, 209, 209)
    }
    #wrapper{
    width: 87%;
    margin: auto;
    padding: 0 10px;
    background-color: rgb(255, 255, 255);
    overflow: hidden;
    }

    #wrapper a {text-decoration: none;}

    #wrapper li {
    display: inline;
    padding: 0px 5px 5px 0px;
    }

    #main-image{
    width: 540px;
    overflow: hidden;
    margin: 0 auto
    }

    #main-image img {
    max-height: 400px;
    width: auto;
    }

    .thumbs{text-align: center;}
</style>
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".thumb").click(function() {

                var big_url = $(this).attr("href");
                $("#main-image img").attr("src", big_url)
                return false;
            });

        });

    </script>
@endpush


