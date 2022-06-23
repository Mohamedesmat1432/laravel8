@section('title','Contact Us Page')

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb px-4 py-3 ">
            <li class="breadcrumb-item"><a href="/">{{__('messages.Home')}}</a></li>
            <li class="breadcrumb-item active bold" aria-current="page">{{__('messages.Contact')}}</li>
        </ol>
    </nav>
    <div class="row m-3">
        @if(Session::has('message_success'))
            <div class="alert alert-success alert-dismissible alert-white rounded">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="icon">
                    <i class="bi bi-check"></i>
                </div>
                <strong>Success!</strong>
                {{Session::get('message_success')}}
            </div>
        @endif
        <div class="col-md-6  mb-3">
            <div class="card">
                {{-- <h5 class="card-header bold">{{__('messages.Contact')}}</h5> --}}
                <div class="card-body bg-light">
                    <form wire:submit.prevent="sendMessage">
                        <div class="form-group">
                            <label class=" control-label bold {{__('messages.float')}}">{{__('messages.Name')}}</label>
                            <input type="text" placeholder="{{__('messages.Name')}}" class="form-control rounded" wire:model="name" >
                            @error('name')<p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class=" control-label bold {{__('messages.float')}}">{{__('messages.Email')}}</label>
                            <input type="text" placeholder="{{__('messages.Email')}}" class="form-control rounded" wire:model="email" >
                            @error('email')<p class="text-danger bold">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class=" control-label bold {{__('messages.float')}}">{{__('messages.Phone')}}</label>
                            <input type="text" placeholder="{{__('messages.Phone')}}" class="form-control rounded" wire:model="phone" >
                            @error('phone')<p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class=" control-label bold {{__('messages.float')}}">{{__('messages.Comment')}}</label>
                            <textarea type="text"cols="" rows="6"  placeholder="{{__('messages.Comment')}}" wire:model="comment" class="form-control rounded"></textarea>
                            @error('comment')<p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary rounded bold {{__('messages.float')}}">{{__('messages.Send Message')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card">
                <div class="map">
                    <iframe src="{{$setting->map}}" width="100%" height="300" allowfullscreen="" loading="lazy" ></iframe>
                </div>
                <h3 class="card-header bold {{__('messages.text')}}">{{__('messages.Contact Details')}}</h3>
                <div class="card-body">
                    <div class="{{__('messages.text')}} mb-3">
                        <i class="bi bi-envelope-fill h5 text-info"></i>
                        <span class="px-3 bold">{{$setting->email}}</span>
                    </div>
                    <div class="{{__('messages.text')}} mb-3">
                        <i class="bi bi-telephone-fill h5 text-primary"></i>
                        <span class="px-3 bold">{{$setting->phone}}</span>
                    </div>
                    <div class="{{__('messages.text')}} mb-3">
                        <i class="bi bi-telephone-fill h5 text-success"></i>
                        <span class="px-3 bold">{{$setting->phone2}}</span>
                    </div>
                    <div class="{{__('messages.text')}} mb-3">
                        <i class="bi bi-geo-alt-fill h5 text-danger"></i>
                        <span class="px-3 bold">{{$setting->address}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

