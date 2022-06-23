@section('title','Shop Page')

<section>
    <div class="container  mt-5" >
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb px-4 py-3">
                <li class="breadcrumb-item hvr-grow"><a href="/">{{__('messages.Home')}}</a> </li>
                <li class="breadcrumb-item active bold hvr-grow" aria-current="page"> {{__('messages.Shop')}}</li>
            </ol>
        </nav>

        <!--start all categories && order-->
        <div class="row p-3">
            <div class="col-md-4 mb-3">
                <div class="card bg-card">
                    <div class="card-body">
                        <h5 class=" bold {{__('messages.text')}}">{{__('messages.All Categories')}}</h5>
                        <hr class="my-2">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                            @foreach ($categories as $category)
                                <li class="nav-item ">
                                    <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="{{__('messages.float')}} hvr-grow">
                                        <i class="bi bi-dash"></i>
                                        {{$category->name}}
                                    </a>
                                    @if (count($category->subCategories) > 0)
                                    <i class="bi bi-caret-down" onclick="$(this).next().slideToggle('.sub-cate')" style="cursor: pointer;"></i>
                                        <ul class="sub-cate" style="display: none">
                                            @foreach ($category->subCategories as $scategory)
                                                <li class="nav-item">
                                                    <a href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}" class="{{__('messages.float')}} hvr-grow">
                                                        <i class="bi bi-dash"></i>
                                                        {{$scategory->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>

                            @endforeach
                        </ul>
                        <hr class="text-dark">
                        <div class="order-by">
                            <div class="form-group">
                                <label class=" control-label bold {{__('messages.float')}}">{{__('messages.Ordered by')}}</label>
                                <div class="px-3">
                                    <select class="form-select" name="orderby" id="order-by" wire:model="sorting" >
                                        <option value="default">{{__('messages.default')}}</option>
                                        <option value="date">{{__('messages.date')}}</option>
                                        <option value="price-asc">{{__('messages.price ascending')}}</option>
                                        <option value="price-desc">{{__('messages.price descending')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" control-label bold {{__('messages.float')}}">{{__('messages.No-in-page')}}</label>
                                <div class="px-3">
                                    <select class="form-select" name="orderby" id="order-by" wire:model="pageSize" >
                                        <option value="6">{{__('messages.per-page-6')}}</option>
                                        <option value="9">{{__('messages.per-page-9')}}</option>
                                        <option value="12">{{__('messages.per-page-12')}}</option>
                                        <option value="15">{{__('messages.per-page-15')}}</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="text-dark">
                            <div class="filter-price">
                                <label class=" bold {{__('messages.float')}}">{{__('messages.Price filter')}}</label>
                                <div class="px-3" >
                                    <p class=" bold"> ${{$min_price}} - ${{$max_price}}</p>
                                    <div id="slider" wire:ignore.change></div>
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                    </div>
                </div>
            </div>
            <!--end all categories && order-->
            <!--start all products shop-->
            <div class="col-md-8 ">
                <div class="card bg-card">
                    <div class="card-body ">
                        <div class="row gx-3 gx-lg-3 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
                            @if($products->count() > 0)
                                @foreach ($products as $product)
                                    <div class="col mt-3">
                                        <div class="card bg-in-card hvr-grow hvr-underline-from-center">
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
                                                    <div class="d-flex justify-content-center h5 text-warning ">
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
                                                    <div class="product-wish">
                                                        @php
                                                            $wishItems = Cart::instance('wishlist')->content()->pluck('id');
                                                        @endphp
                                                        @if ($wishItems->contains($product->id))
                                                            <a  wire:click.prevent="removeFromWishlist({{$product->id}})">
                                                                <i class="bi-heart-fill fill-star"></i>
                                                            </a>
                                                        @else
                                                            <a  wire:click.prevent="addToWishList('{{$product->id}}','{{$product->name}}','{{$product->regular_price}}')"><i class="bi-heart-fill "></i></a>
                                                        @endif
                                                    </div>
                                                    <!-- Product price-->
                                                    @if ($product->sale_price > 0  && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <span> ${{$product->sale_price}}</span>
                                                        <del><span> ${{$product->regular_price}}</span></del>
                                                    @else
                                                        <span>${{$product->regular_price}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Product actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                {{-- <div class="text-center">
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
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="contaner-fluied">
                                    <span class="text-danger bold">No product for this name</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="links {{__('messages.text')}}">
                    {{$products->links()}}
                </div>
            </div>
            <!--end all products shop-->
        </div>
    </div>
</section>
@push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider,{
            start: [1,1000],
            connect: true,
            range: {
                'min': 1,
                'max': 1000,
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density: 4
            },
            direction:  '{{ LaravelLocalization::getCurrentLocaleDirection() }}'
        });
        slider.noUiSlider.on('update',function(value) {
            @this.set('min_price',value[0]);
            @this.set('max_price',value[1]);
        });
    </script>
@endpush


