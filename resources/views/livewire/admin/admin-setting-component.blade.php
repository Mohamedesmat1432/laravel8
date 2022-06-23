@section('title','Settings Page')

<section>
    <div class="container p-5" >
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Settings')}}
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
                        <form class="form-horizontal {{__('messages.text')}}" wire:submit.prevent="saveSetting">
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Email')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Email" class="form-control rounded w-100" wire:model="email" >
                                    @error('email')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Phone')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Phone" class="form-control rounded w-100" wire:model="phone" >
                                    @error('phone')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Phone2')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Phone2" class="form-control rounded w-100" wire:model="phone2" >
                                    @error('phone4')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Address')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Address" class="form-control rounded w-100" wire:model="address" >
                                    @error('address')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Map')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Map" class="form-control rounded w-100" wire:model="map" >
                                    @error('map')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Twitter')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Twitter" class="form-control rounded w-100" wire:model="twitter" >
                                    @error('twitter')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Facebook')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="facebook" class="form-control rounded w-100" wire:model="facebook" >
                                    @error('facebook')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Instagram')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Instagram" class="form-control rounded w-100" wire:model="instagram" >
                                    @error('instagram')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Pinterest')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Pinterest" class="form-control rounded w-100" wire:model="pinterest" >
                                    @error('pinterest')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Youtube')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="youtube" class="form-control rounded w-100" wire:model="youtube" >
                                    @error('youtube')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-primary bold rounded">{{__('messages.Submit')}}</button>
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
