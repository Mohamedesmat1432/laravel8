@section('title','Checkout Page')

<section>
    <div class="container p-5" >
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb px-4 py-3">
                <li class="breadcrumb-item"><a href="/">{{__('messages.Home')}}</a></li>
                <li class="breadcrumb-item"><a href="/cart">{{__('messages.Cart')}}</a></li>
                <li class="breadcrumb-item active bold">{{__('messages.Checkout')}}</li>
            </ol>
        </nav>

        <form wire:submit.prevent="placeOrder" onsubmit="$('#processing').show()" class="p-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <h5 class="card-header bold {{__('messages.text')}}">{{__('messages.Billing Address')}}</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.First Name')}}:</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.First Name')}}" class="form-control input-md rounded" wire:model="firstname" >
                                            @error('firstname')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Last Name')}}:</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Last Name')}}" class="form-control input-md rounded" wire:model="lastname" >
                                            @error('lastname')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Email')}}:</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Email')}}" class="form-control input-md rounded" wire:model="email" >
                                            @error('email')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Mobile')}}:</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Mobile')}}" class="form-control input-md rounded" wire:model="mobile" >
                                            @error('mobile')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Province')}}:</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Province')}}" class="form-control input-md rounded" wire:model="province" >
                                            @error('province')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Line1')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Line1')}}" class="form-control input-md rounded" wire:model="line1" >
                                            @error('line1')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Line2')}}:</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Line2')}}" class="form-control input-md rounded" wire:model="line2" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.City')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.City')}}" class="form-control input-md rounded" wire:model="city" >
                                            @error('city')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Country')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Country')}}" class="form-control input-md rounded" wire:model="country" >
                                            @error('country')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Zipcode')}}:</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Zipcode')}}" class="form-control input-md rounded" wire:model="zipcode" >
                                            @error('zipcode')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="different-shipping {{__('messages.text')}}" >
                        <input type="checkbox" value="1" class="form-cotrol input-md" wire:model="ship_to_different" >
                        <label class="control-label bold">{{__('messages.is different shipping')}}</label>
                    </div>
                    @if ($ship_to_different)
                    <div class="card">
                        <h5 class="card-header bold {{__('messages.text')}}">{{__('messages.Shipping')}}</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.First Name')}}:</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.First Name')}}" class="form-control input-md rounded" wire:model="s_firstname" >
                                            @error('s_firstname')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Last Name')}}:</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Last Name')}}" class="form-control input-md rounded" wire:model="s_lastname" >
                                            @error('s_lastname')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Email')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Email')}}" class="form-control input-md rounded" wire:model="s_email" >
                                            @error('s_email')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Mobile')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Mobile')}}" class="form-control input-md rounded" wire:model="s_mobile" >
                                            @error('s_mobile')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Province')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Province')}}" class="form-control input-md rounded" wire:model="s_province" >
                                            @error('s_province')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Line1')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Line1')}}" class="form-control input-md rounded" wire:model="s_line1" >
                                            @error('s_line1')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Line2')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Line2')}}" class="form-control input-md rounded" wire:model="s_line2" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.City')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.City')}}" class="form-control input-md rounded" wire:model="s_city" >
                                            @error('s_city')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Country')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Country')}}" class="form-control input-md rounded" wire:model="s_country" >
                                            @error('s_country')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label bold">{{__('messages.Zipcode')}} :</label>
                                        <div class="col-md-8" >
                                            <input type="text" placeholder="{{__('messages.Zipcode')}}" class="form-control input-md rounded" wire:model="s_zipcode" >
                                            @error('s_zipcode')<p class="text-danger text-left mb-3">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-header bold {{__('messages.text')}}">{{__('messages.Payment Method')}}</h5>
                                <div class="card-body">
                                    @if (Session::has('stripe_error'))
                                        <div class="alert alert-danger alert-dismissible alert-white rounded">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <div class="icon">
                                                <i class="bi bi-x-circle"></i>
                                            </div>
                                            <strong>Success!</strong>
                                            {{Session::get('stripe_error')}}
                                        </div>
                                    @endif
                                    <div class="payment-method {{__('messages.text')}}">
                                        <input type="radio" value="cod" wire:model="paymentmode">
                                        <span>{{__('messages.Cash On Delivery')}}</span>
                                    </div>
                                    <div class="payment-method {{__('messages.text')}}">
                                        <input type="radio" value="card" wire:model="paymentmode">
                                        <span>{{__('messages.Cash On Credit Card')}}</span>
                                    </div>
                                    <div class="payment-method {{__('messages.text')}}">
                                        <input type="radio" value="paypal" wire:model="paymentmode">
                                        <span>{{__('messages.Cash On Paypal')}}</span>
                                    </div>
                                    @error('paymentmode')<p class="text-danger {{__('messages.text')}} mb-3">{{$message}}</p>@enderror
                                    <hr class="my-2">
                                    @if (Session::has('checkout'))
                                        <p class="grand-total bold {{__('messages.text')}}"> {{__('messages.Total')}} : <span>${{Session::get('checkout')['total']}}</span></p>
                                    @endif
                                    @if ($errors->isEmpty())
                                        <div wire:ignore id="processing" class="px-3 text-success" style="display: none">
                                            <i class="spinner-border text-success"></i>
                                            <span>Processing...</span>
                                        </div>
                                    @endif
                                    <button class="btn btn-card w-100 rounded"  type="submit">{{__('messages.Place Order Now')}}</button>
                                </div>
                            </div>
                            {{-- <div class="">
                                <h5 class="text-dark">{{__('messages.Shipping Method')}}</h5>
                                <hr>
                                <p class="flat-rate">{{__('messages.Flat Rate')}} <span></span></p>
                                <p class="fixed-rate">{{__('messages.Fixed')}} <span>0</span></p>
                            </div> --}}
                        </div>
                    </div>
                    @if ($paymentmode == 'card')
                        <div class="card mt-3 bg-light">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class=" control-label bold {{__('messages.text')}}">{{__('messages.Card Number')}}</label>
                                    <div class="col-md-12" >
                                        <input type="text" placeholder="{{__('messages.Card Number')}}" class="form-control input-md rounded" wire:model="card_number" >
                                        @error('card_number')<p class="text-danger {{__('messages.text')}} mb-3">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label bold {{__('messages.text')}}">{{__('messages.Expiry Month')}}</label>
                                    <div class="col-md-12" >
                                        <input type="text" placeholder="{{__('messages.Expiry Month')}}" class="form-control  rounded" wire:model="expiry_month" >
                                        @error('expiry_month')<p class="text-danger {{__('messages.text')}} mb-3">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label bold {{__('messages.text')}}">{{__('messages.Expiry Year')}}</label>
                                    <div class="col-md-12" >
                                        <input type="text" placeholder="{{__('messages.Expiry Year')}}" class="form-control input-md rounded" wire:model="expiry_year" >
                                        @error('expiry_year')<p class="text-danger {{__('messages.text')}} mb-3">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label bold {{__('messages.text')}}">{{__('messages.CVC')}}</label>
                                    <div class="col-md-12" >
                                        <input type="password" placeholder="{{__('messages.CVC')}}" class="form-control input-md rounded" wire:model="cvc" >
                                        @error('cvc')<p class="text-danger {{__('messages.text')}} mb-3">{{$message}}</p>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</section>

