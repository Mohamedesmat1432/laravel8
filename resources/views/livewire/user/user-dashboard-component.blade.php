@section('title','Dashboard Page')

<section>
    <div class="p-5">
        <div class="row mb-5 text-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>{{__('messages.Total Cost')}}</h3>
                        <div class="card-header bg-success rounded mt-3">
                            <h5>{{$totalCost}} {{__('messages.$')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>{{__('messages.Total Purchase')}}</h3>
                        <div class="card-header bg-warning rounded mt-3">
                            <h5> {{$totalPurchase}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>{{__('messages.Total Delivered')}}</h3>
                        <div class="card-header bg-primary rounded mt-3">
                            <h5>{{$totalDelivered}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3>{{__('messages.Total Canceled')}}</h3>
                        <div class="card-header bg-danger rounded mt-3">
                            <h5>{{$totalCanceled}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Latest Orders')}}
                </h3>
                <hr>
                    <div>
                        <table class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-xl text-center">
                            <thead>
                                <th>{{__('messages.ID')}}</th>
                                <th>{{__('messages.Subtotal')}} </th>
                                <th>{{__('messages.Discount')}}</th>
                                <th>{{__('messages.Tax')}}</th>
                                <th>{{__('messages.Total')}}</th>
                                <th>{{__('messages.First Name')}}</th>
                                <th>{{__('messages.Last Name')}}</th>
                                <th>{{__('messages.Mobile')}}</th>
                                <th>{{__('messages.Email')}}</th>
                                <th>{{__('messages.Zipcode')}}</th>
                                <th>{{__('messages.Status')}}</th>
                                <th>{{__('messages.Order Date')}}</th>
                                <th> {{__('messages.Action')}}</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->subtotal}}</td>
                                        <td>{{$order->discount}}</td>
                                        <td>{{$order->tax}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->firstname}}</td>
                                        <td>{{$order->lastname}}</td>
                                        <td>{{$order->mobile}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->zipcode}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            <a class="btn btn-outline-success btn-sm rounded" href="{{route('user.orderdetails',['order_id'=>$order->id])}}">{{__('messages.Details')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
