@section('title','Products Page')

<section>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}} rounded mb-2">
                    {{__('messages.All Products')}}
                    <a href="{{route('admin.addproduct')}}" class="btn btn-outline-success {{__('messages.floatx')}} rounded bold">{{__('messages.Add New Product')}}
                    </a>
                </h3>
                <hr class="text-dark">
                <input type="text" wire:model="searchItem" class="form-control rounded mb-2" placeholder="{{__('messages.Search')}}...">
                <div>
                    @if (Session::has('message_success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{Session::get('message_success')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered text-center t-sm table-responsive-md table-responsive-xl w-100 {{__('messages.text')}}">
                        <thead>
                            <th>{{__('messages.ID')}}</th>
                            <th>{{__('messages.Image')}}</th>
                            <th>{{__('messages.Name')}}</th>
                            <th>{{__('messages.Stock')}}</th>
                            <th>{{__('messages.Price')}}</th>
                            <th>{{__('messages.Sale Price')}}</th>
                            <th>{{__('messages.Category')}}</th>
                            {{-- <th>{{__('messages.Date')}}</th> --}}
                            <th colspan="2" class="text-center">{{__('messages.Action')}}</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" width="40" height="40" alt=""></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->stock_status}}</td>
                                    <td>${{$product->regular_price}}</td>
                                    <td>{{$product->sale_price}}</td>
                                    <td>{{$product->category->name}}</td>
                                    {{-- <td>{{$product->created_at}}</td> --}}
                                    <td>
                                        <a class="btn btn-outline-primary rounded btn-sm bold" href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}">
                                            {{__('messages.edit')}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-danger rounded btn-sm bold" href="#" onclick="confirm('are you sure, delete this item?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})">
                                            {{__('messages.delete')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="links {{__('messages.text')}}">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

