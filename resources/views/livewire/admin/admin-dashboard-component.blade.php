@section('title','Dashboard Page')

<section>
    <div class="container p-5">
        <div class="row mb-5 text-center">
            <div class="col-md-3">
                <div class="card hvr-grow">
                    <div class="card-body">
                        <h3>{{__('messages.Total Sales')}}</h3>
                        <i class="bi bi-bar-chart-line-fill h1 text-warning"></i>
                        <div class="card-header  mb-3 rounded bg-success text-white">
                            <h5>{{$totalSales}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  hvr-grow">
                    <div class="card-body">
                        <h3>{{__('messages.Total Revenue')}}</h3>
                        <i class="bi bi-currency-exchange h1 text-success"></i>
                        <div class="card-header  mb-3 rounded bg-warning text-white">
                            <h5> {{$totalRevenue}} {{__('messages.$')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  hvr-grow">
                    <div class="card-body">
                        <h3>{{__('messages.Today Sales')}}</h3>
                        <i class="bi bi-arrow-up-right h1 text-primary"></i>
                        <div class="card-header  mb-3 rounded text-white" style="background-color: #da0000;">
                            <h5>{{$todaySales}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card  hvr-grow">
                    <div class="card-body">
                        <h3>{{__('messages.Today Revenue')}}</h3>
                        <i class="bi bi-graph-up h1" style="color: #d60909;"></i>
                        <div class="card-header mb-3 rounded bg-primary text-white">
                            <h5>{{$todayRevenue}} {{__('messages.$')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}} ">
                    {{__('messages.Latest Orders')}}
                </h3>
                <hr>
                <div>
                    <table class="table table-striped table-responsive-sm table-responsive-md table-responsive-xl text-center table-bordered">
                        <thead>
                            <th>{{__('messages.ID')}}</th>
                            {{-- <th>{{__('messages.Subtotal')}} </th>
                            <th>{{__('messages.Discount')}}</th>
                            <th>{{__('messages.Tax')}}</th> --}}
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
                                    {{-- <td>{{$order->subtotal}}</td>
                                    <td>{{$order->discount}}</td>
                                    <td>{{$order->tax}}</td> --}}
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->firstname}}</td>
                                    <td>{{$order->lastname}}</td>
                                    <td>{{$order->mobile}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->zipcode}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        <a class="btn btn-outline-success btn-sm rounded bold" href="{{route('admin.orderdetails',['order_id'=>$order->id])}}">{{__('messages.Details')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
