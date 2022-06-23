@section('title','Edit Profile Page')

<section>
    <div class="container p-5">
        <h3 class="card-header-home bold {{__('messages.text')}}">
            {{__('messages.Edit Profile')}}
            <a href="{{route('user.profile')}}" class="btn btn-outline-success bold rounded {{__('messages.floatx')}}">{{__('messages.My Profile')}}</a>
        </h3>
        <hr>
        <div class="card">
            <div class="card-body bg-light">
                <form wire:submit.prevent="updateProfile" class="{{__('messages.text')}}">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($newimage)
                                <img class="w-100" src="{{$newimage->temporaryUrl()}}">
                            @elseif($image)
                                <img class="w-100" src="{{asset('assets/images/profile')}}/{{$image}}">
                            @else
                                <img class="w-100" src="{{asset('assets/images/profile/default.png')}}">
                            @endif
                            <input type="file" class="form-control" wire:model="newimage">
                        </div>
                        <div class="col-md-8">
                            <p><b>Name: </b> <input type="text" class="form-control" wire:model="name"></p>
                            <p><b>Email: </b> {{$email}}</p>
                            <p><b>Mobile: </b> <input type="text" class="form-control" wire:model="mobile"></p>
                            <p><b>Line1: </b> <input type="text" class="form-control" wire:model="line1"></p>
                            <p><b>Line2: </b> <input type="text" class="form-control" wire:model="line2"></p>
                            <p><b>City: </b> <input type="text" class="form-control" wire:model="city"></p>
                            <p><b>Province: </b> <input type="text" class="form-control" wire:model="province"></p>
                            <p><b>country: </b> <input type="text" class="form-control" wire:model="country"></p>
                            <p class="mb-3"><b>Zipcode: </b> <input type="text" class="form-control" wire:model="zipcode"></p>
                            <button type="submit" class="btn btn-primary rounded bold">{{__('messages.Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
