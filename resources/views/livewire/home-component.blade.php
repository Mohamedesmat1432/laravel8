@section('title','HomePage')





<section>
    <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel" >
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                <div class="carousel-item {{$slider->id == 1 ? 'active' : ''}}">
                    <img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" class="d-block  w-100"  style="height: 480px" alt="{{$slider->title}}">
                    <div class="carousel-caption d-none d-md-block" style="background: #6b4cb31c;">
                        <h5 class="text-dark"> {{$slider->title}}</h5>
                        <p class="text-dark">{{$slider->subtitle}}</p>
                        <p class="text-dark"> {{$slider->price}} {{__('messages.$')}}</p>
                        <a href="{{$slider->link}}" class="btn btn-outline-success bold rounded">{{__('messages.Shop Now')}}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <section class="d-flex justify-content-between p-4" style="background-color: #383838;">
        <div class="me-5">
            <span class="bold text-white">مرحبا بكم في متجر الجمل</span>
        </div>
        <div>
            <a href="#" class="text-white me-4">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="text-white me-4">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="#" class="text-white me-4">
                <i class="bi bi-google"></i>
            </a>
            <a href="#" class="text-white me-4">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="#" class="text-white me-4">
                <i class="bi bi-linkedin"></i>
            </a>
            <a href="#" class="text-white me-4">
                <i class="bi bi-github"></i>
            </a>
        </div>
    </section>
    <!--start latest products-->
    <div class="container p-5">
        <div class="card">
            <h3 class="card-header bold {{__('messages.text')}}">{{__('messages.Home Page')}}</h3>
            <div class="card-body">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($l_products as $l_product)
                    <div class="col mb-3">
                        <div class="card bg-in-card hvr-grow hvr-underline-from-center">
                            <!-- Product image-->
                            <a href="{{route('product.details',['slug' => $l_product->slug])}}">
                                <img class="w-100" height="150"  src="{{asset('assets/images/products')}}/{{$l_product->image}}" alt="{{$l_product->name}}" />
                            </a>
                            <!-- Product details-->
                            <div class="card-body">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h6 class="fw-bolder">{{$l_product->name}}</h6>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center h5 text-warning mb-2">
                                        @php
                                            $avgrating = 0;
                                        @endphp
                                        @foreach ($l_product->orderItems->where('rstatus',1) as $orderItem)
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
                                    @if ($l_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <span> {{$l_product->sale_price}} {{__('messages.$')}}</span>
                                        <del><span> {{$l_product->regular_price}}{{__('messages.$')}}</span></del>
                                    @else
                                        <span>{{$l_product->regular_price}} {{__('messages.$')}}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-3 pt-0 border-top-0 bg-transparent ">
                                {{-- <hr> --}}
                                {{-- <div class="text-center">
                                    @if ($l_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                        <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$l_product->id}}','{{$l_product->name}}','{{$l_product->sale_price}}')">
                                            {{__('messages.Add to cart')}}
                                            <i class="bi bi-cart3"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$l_product->id}}','{{$l_product->name}}','{{$l_product->regular_price}}')">
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
    <!--end latest products-->
    <!--start categories product-->
    <div class="container p-5">
        <div class="card">
            <h3 class="card-header bold {{__('messages.text')}}">{{__('messages.Categories')}}</h3>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        @foreach ($categories as $key=>$category)
                        <button class="nav-link {{$key==0 ?'active' : ''}} text-dark" id="nav-{{$category->name}}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{$category->id}}" type="button" role="tab" aria-controls="nav-{{$category->name}}" aria-selected="{{$key==0 ?'true' : ''}}">
                            {{$category->name}}
                        </button>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach ($categories as $key=>$category)
                    <div class="tab-pane fade show {{$key==0 ?'active' : ''}}" id="nav-{{$category->id}}" role="tabpanel" aria-labelledby="nav-{{$category->id}}-tab">
                        @php
                            $c_products = DB::table('products')->where('category_id',$category->id)->get()->take($no_of_products);
                        @endphp
                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center  py-3">
                            @foreach ($c_products as $c_product)
                            <div class="col-md-4 mb-3">
                                <div class="card bg-in-card hvr-grow hvr-underline-from-center">
                                    <!-- Product image-->
                                    <a href="{{route('product.details',['slug' => $c_product->slug])}}">
                                        <img class="w-100" height="150" src="{{asset('assets/images/products')}}/{{$c_product->image}}" alt="{{$c_product->name}}"  />
                                    </a>
                                        <!-- Product details-->
                                    <div class="card-body ">
                                        <div class="text-center">
                                                <!-- Product name-->
                                                <h6 class="fw-bolder">{{$c_product->name}}</h6>
                                                <!-- Product reviews-->

                                                <!-- Product price-->
                                                @if ($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                        <span> {{$c_product->sale_price}} {{__('messages.$')}}</span>
                                                        <del><span> {{$c_product->regular_price}} {{__('messages.$')}}</span></del>
                                                @else
                                                    <span>{{$c_product->regular_price}} {{__('messages.$')}}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-3 pt-0 border-top-0 bg-transparent">
                                        {{-- <hr> --}}
                                        {{-- <div class="text-center">
                                            @if ($c_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$c_product->id}}','{{$c_product->name}}','{{$c_product->sale_price}}')">
                                                    {{__('messages.Add to cart')}}
                                                    <i class="bi bi-cart3"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$c_product->id}}','{{$c_product->name}}','{{$c_product->regular_price}}')">
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--end categories product-->
    <!--start sale products-->
    @if($s_products->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
    <div class="container sale-product px-3 px-lg-3 my-3">
        <div class="card">
            <h3 class="card-header bold {{__('messages.text')}}">{{__('messages.Sales')}}</h3>
            <div class="card-body">
                <div id="countdown" data-expire="{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s')}}"></div>
                <div class="splide px-5">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($s_products as $s_product)
                            <li class="splide__slide p-3">
                                <div class="card h-100 hvr-grow hvr-underline-from-center">
                                    <!-- Product image-->
                                    <a href="{{route('product.details',['slug' => $s_product->slug])}}">
                                        <img class="card-img" src="{{asset('assets/images/products')}}/{{$s_product->image}}" alt="{{$s_product->name}}" />
                                    </a>
                                        <!-- Product details-->
                                    <div class="card-body ">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h6 class="fw-bolder">{{$s_product->name}}</h6>
                                            <!-- Product reviews-->
                                            <div class="d-flex justify-content-center h5 text-warning mb-2">
                                                @php
                                                    $avgrating = 0;
                                                @endphp
                                                @foreach ($s_product->orderItems->where('rstatus',1) as $orderItem)
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
                                            <span>{{$s_product->sale_price}} {{__('messages.$')}}</span>
                                            <del><span>{{$s_product->regular_price}} {{__('messages.$')}}</span></del>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        {{-- <div class="text-center">
                                            @if ($s_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                                                <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$s_product->id}}','{{$s_product->name}}','{{$s_product->sale_price}}')">
                                                    {{__('messages.Add to cart')}}
                                                    <i class="bi bi-cart3"></i>
                                                </button>
                                            @else
                                                <button class="btn btn-card mt-auto rounded" wire:click.prevent="store('{{$s_product->id}}','{{$s_product->name}}','{{$s_product->regular_price}}')">
                                                    {{__('messages.Add to cart')}}
                                                    <i class="bi bi-cart3"></i>
                                                </button>
                                            @endif
                                        </div> --}}
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            new Splide( '.splide', {
            type   : 'loop',
            perPage: 4,
            perMove: 1,
            } ).mount();
        </script>
    @endpush
    @endif
    <!--end sale products-->
</section>


