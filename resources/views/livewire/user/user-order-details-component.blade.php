@section('title','Order details Page')

<section>
    <div class="container p-5">
        <div class="row ">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Order Items')}}
                    <a href="{{route('user.orders')}}" class="btn btn-outline-success rounded bold {{__('messages.floatx')}}">{{__('messages.All Orders')}}</a>
                    @if ($order->status == 'orderd')
                        <a href="#" wire:click.prevent="cancelOrder" class="btn btn-outline-warning bold rounded mx-3 {{__('messages.floatx')}}">{{__('messages.Cancel Order')}}</a>
                    @endif
                </h3>
                <hr>
                <div>
                    <div class="order-status">
                        <table class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-xl text-center">
                            <th>{{__('messages.ID')}}</th>
                            <td>{{$order->id}}</td>
                            <th>{{__('messages.Order Date')}}</th>
                            <td>{{$order->created_at}}</td>
                            <th>{{__('messages.Status')}}</th>
                            <td>{{$order->status}}</td>
                            @if ($order->status == 'delivered')
                            <th>{{__('messages.Delivery Status')}}</th>
                            <td>{{$order->delivered_date}}</td>
                            @elseif($order->status == 'canceled')
                                <th>{{__('messages.Cancel Status')}}</th>
                                <td>{{$order->canceled_date}}</td>
                            @endif
                        </table>
                    </div>
                    <table class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-xl text-center">
                        <thead>
                            <th>{{__('messages.Image')}}</th>
                            <th>{{__('messages.Product Name')}}</th>
                            <th>{{__('messages.Price')}}</th>
                            <th>{{__('messages.Quantity')}}</th>
                            <th>{{__('messages.Total Price')}}</th>
                            <th>{{__('messages.Product Attributes')}}</th>
                            <th>{{__('messages.Action')}}</th>
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
                                    @else
                                        <td></td>
                                    @endif
                                    @if ($order->status == 'delivered' && $item->rstatus == false)
                                        <td>
                                            <a href="{{route('user.review',['order_item_id'=>$item->id])}}">
                                                {{__('messages.Write Review')}}
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            {{__('messages.Unavailable')}}
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
                                <td>${{$order->tax}}</</td>
                                <td>Free Shipping</td>
                                <td>${{$order->total}}</</td>
                            </tbody>
                        </table>
                    </div>
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
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Shipping')}}
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
