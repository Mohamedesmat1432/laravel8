@section('title','Orders Details Page')

<section>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class=" card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Order Items')}}
                    <a href="{{route('admin.orders')}}" class="btn btn-outline-success bold {{__('messages.floatx')}} rounded">
                        {{__('messages.All Orders')}}
                    </a>
                </h3>
                <hr>
                <div class="order-status">
                    <table class="table  table-bordered border-2 table-responsive-sm table-responsive-md table-responsive-xl text-center">
                        <th>{{__('messages.ID')}}</th>
                        <td>{{$order->id}}</td>
                        <th>{{__('messages.Order Date')}}</th>
                        <td>{{$order->created_at}}</td>
                        <th>{{__('messages.Status')}}</th>
                        <td>{{$order->status}}</td>
                        @if ($order->status == 'delivered')
                        <th>{{__('messages.Delivery Status')}}</th>
                        <td>{{$order->delivered_date}}</td>
                        @elseif($order->status)
                            <th>{{__('messages.Cancel Status')}}</th>
                            <td>{{$order->canceled_date}}</td>
                        @endif
                    </table>
                </div>
                <table class="table table-striped table-bordered border-2 table-responsive-sm table-responsive-md table-responsive-xl text-center">
                    <thead>
                        <th>{{__('messages.Image')}}</th>
                        <th>{{__('messages.Product Name')}}</th>
                        <th>{{__('messages.Price')}}</th>
                        <th>{{__('messages.Quantity')}}</th>
                        <th>{{__('messages.Total Price')}}</th>
                        <th>{{__('messages.Product Attributes')}}</th>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" width="40" height="40" alt=""></td>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price * $item->quantity}}</td>
                                @if ($item->options)
                                <td>
                                    @foreach (unserialize($item->options) as $key => $value)
                                    {{$key}}: {{$value}}
                                    @endforeach
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="summary">
                    <table class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-xl text-center">
                        <thead>
                            <th>{{__('messages.Subtotal')}}</th>
                            <th>{{__('messages.Tax')}}</th>
                            <th>{{__('messages.Shipping')}}</th>
                            <th>{{__('messages.Total')}}</th>
                        </thead>
                        <tbody>
                            <td>${{$order->subtotal}}</td>
                            <td>${{$order->tax}}</td>
                            <td>Free Shipping</td>
                            <td>${{$order->total}}</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Billing')}}
                </h3>
                <hr>
                <div>
                    <table class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-xl text-center">
                        <thead>
                            <th>{{__('messages.First Name')}}</th>
                            <th>{{__('messages.Last Name')}}</th>
                            <th>{{__('messages.Email')}}</th>
                            <th>{{__('messages.Mobile')}}</th>
                            <th>{{__('messages.Line 1')}}</th>
                            <th>{{__('messages.Line 2')}}</th>
                            <th>{{__('messages.City')}}</th>
                            <th>{{__('messages.Country')}}</th>
                            <th>{{__('messages.Zipcode')}}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order->firstname}}</td>
                                <td>{{$order->lastname}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->mobile}}</td>
                                <td>{{$order->line1}}</td>
                                <td>{{$order->line2}}</td>
                                <td>{{$order->city}}</td>
                                <td>{{$order->country}}</td>
                                <td>{{$order->zipcode}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($order->is_different_shipping)
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-5">
                    <h3 class="card-header-home bold {{__('messages.text')}}">
                        {{__('messages.Shipping')}}
                    </h3>
                    <div>
                        <table class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-xl text-center">
                            <thead>
                                <th>{{__('messages.First Name')}}</th>
                                <th>{{__('messages.Last Name')}}</th>
                                <th>{{__('messages.Email')}}</th>
                                <th>{{__('messages.Mobile')}}</th>
                                <th>{{__('messages.Line 1')}}</th>
                                <th>{{__('messages.Line 2')}}</th>
                                <th>{{__('messages.City')}}</th>
                                <th>{{__('messages.Country')}}</th>
                                <th>{{__('messages.Zipcode')}}</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$order->shipping->firstname}}</td>
                                    <td>{{$order->shipping->lastname}}</td>
                                    <td>{{$order->shipping->email}}</td>
                                    <td>{{$order->shipping->mobile}}</td>
                                    <td>{{$order->shipping->line1}}</td>
                                    <td>{{$order->shipping->line2}}</td>
                                    <td>{{$order->shipping->city}}</td>
                                    <td>{{$order->shipping->country}}</td>
                                    <td>{{$order->shipping->zipcode}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($order->transaction)
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Transaction')}}
                </h3>
                <hr>
                <div>
                    <table class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-xl text-center">
                        <thead>
                            <th>{{__('messages.Transaction Mode')}}</th>
                            <th>{{__('messages.Transaction Status')}}</th>
                            <th>{{__('messages.Transaction Date')}}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$order->transaction->mode}}</td>
                                <td>{{$order->transaction->status}}</td>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
