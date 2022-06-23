@section('title','Add Coupon Page')

<section>
    <div class="container p-5">
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Add New Coupon')}}
                    <a href="{{route('admin.coupon')}}" class="btn btn-card {{__('messages.floatx')}} rounded">
                        {{__('messages.All Coupons')}}
                    </a>
                </h3>
                <hr>
                <div class="card">
                    @if (Session::has('message_success'))
                        <div class="alert alert-success alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{Session::get('message_success')}}
                        </div>
                    @endif
                    <div class="card-body bg-light">
                        <form class="form-horizontal {{__('messages.text')}}" enctype="multipart/form-data" wire:submit.prevent="addCoupon">
                            <div class="form-group ">
                                <label class="col-md-4 control-label bold">{{__('messages.Coupon Code')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{__('messages.Coupon Code')}}" class="form-control rounded w-100" wire:model="code"/>
                                    @error('code')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="col-md-4 control-label bold">{{__('messages.Coupon Type')}}</label>
                                <div class="col-md-12">
                                    <select class="form-control w-100 rounded" wire:model="type">
                                        <option value="">{{__('messages.Select')}}</option>
                                        <option value="percent">{{__('messages.Percent')}}</option>
                                        <option value="fixed">{{__('messages.Fixed')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label bold">{{__('messages.Coupon Value')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{__('messages.Coupon Value')}}" class="form-control rounded w-100" wire:model="value"/>
                                    @error('value')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label bold">{{__('messages.Cart Value')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{__('messages.Cart Value')}}" class="form-control rounded w-100" wire:model="cart_value"/>
                                    @error('cart_value')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4  control-label bold">{{__('messages.Expiry Date')}}</label>
                                <div class="col-md-12">
                                    <input type="text" id="expiry-date" placeholder="{{__('messages.YYYY-MM-DD')}}" class="form-control rounded w-100" wire:model="expiry_date"/>
                                    @error('expiry_date')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-success bold rounded">{{__('messages.Submit')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(function(){
            $('#expiry-date').datetimepicker({
                format: 'Y-MM-DD',
            })
            .on('dp.change',function(e){
                var data = $('#expiry-date').val();
                @this.set('expiry_date',data);
            });
        });
    </script>
@endpush
