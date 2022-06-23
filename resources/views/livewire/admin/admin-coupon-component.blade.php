@section('title','Coupons Page')

<section>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.All Coupons')}}
                    <a href="{{route('admin.addcoupon')}}" class="btn btn-card {{__('messages.floatx')}} rounded">
                        {{__('messages.Add New Coupon')}}
                    </a>
                </h3>
                <hr>
                <div>
                    @if (Session::has('message_success'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{Session::get('message_success')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-xl text-center">
                        <thead>
                            <th>{{__('messages.ID')}}</th>
                            <th>{{__('messages.Coupon Code')}}</th>
                            <th>{{__('messages.Coupon Type')}}</th>
                            <th>{{__('messages.Coupon Value')}}</th>
                            <th>{{__('messages.Cart Value')}}</th>
                            <th>{{__('messages.Expiry Date')}}</th>
                            <th colspan="2">{{__('messages.Action')}}</th>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->type}}</td>
                                    @if ($coupon->type == 'fixed')
                                        <td>${{$coupon->value}}</td>
                                    @else
                                        <td>{{$coupon->value}}%</td>
                                    @endif
                                    <td>{{$coupon->cart_value}}</td>
                                    <td>{{$coupon->expiry_date}}</td>
                                    <td>
                                        <a class="btn btn-outline-primary btn-sm rounded bold" href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}">
                                            {{__('messages.edit')}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-danger btn-sm rounded bold" href="#" onclick="confirm('هل تريد حذف الكوبون؟.') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})">
                                            {{__('messages.delete')}}
                                        </a>
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

