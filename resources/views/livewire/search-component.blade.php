@section('title','Search Page')
<section>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb px-4 py-3">
                <li class="breadcrumb-item"><a href="/">{{__('messages.Home')}}</a></li>
                <li class="breadcrumb-item active bold" aria-current="page">{{__('messages.Search')}}</li>
            </ol>
        </nav>

        <div class="row p-3">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header bold">{{__('messages.Search Result')}}</h5>
                    <div class="card-body bg-card">
                        <div class="row gx-2 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mb-2">
                            @if($products->count() > 0)
                                @foreach ($products as $product)
                                <div class="col mt-3">
                                    <div class="card">
                                        <!-- Product image-->
                                        <a href="{{route('product.details',['slug' => $product->slug])}}">
                                            <img class="w-100" height="150" src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}" />
                                        </a>
                                        <!-- Product details-->
                                        <div class="card-body">
                                            <div class="text-center">
                                                <!-- Product name-->
                                                <h6 class="fw-bolder">{{$product->name}}</h6>
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
                                                @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                    <span> ${{$product->sale_price}}</span>
                                                    <del><span> ${{$product->regular_price}}</span></del>
                                                @else
                                                    <span>${{$product->regular_price}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center">
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
                                @endforeach
                            @else
                                <div class="alert alert-danger alert-dismissible alert-white rounded">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <div class="icon">
                                        <i class="bi bi-x-circle"></i>
                                    </div>
                                    <strong>Success!</strong>
                                    No Product For This Name
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <ul class="pagination">
                <li class="page-link"> {{$products->links()}}</li>
            </ul>
        </div>
    </div>
</section>
