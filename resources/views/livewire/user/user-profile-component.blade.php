@section('title','Profile Page')

<section>
    <div class="container p-5">
        <h3 class="card-header-home bold {{__('messages.text')}}">
            {{__('messages.My Profile')}}
            <a href="{{route('user.editprofile')}}" class="btn btn-outline-success bold rounded {{__('messages.floatx')}}">{{__('messages.Update Profile')}}</a>
        </h3>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row {{__('messages.text')}}">
                    <div class="col-md-4">
                        @if ($user->profile->image)
                            <img class="w-100" src="{{asset('assets/images/profile')}}/{{$user->profile->image}}">
                        @else
                            <img class="w-100" src="{{asset('assets/images/profile/default.png')}}">
                        @endif
                    </div>
                    <div class="col-md-8 {{__('messages.text')}}">
                        <p><b>Name: </b> {{$user->name}}</p>
                        <p><b>Email: </b> {{$user->email}}</p>
                        <p><b>Mobile: </b> {{$user->profile->mobile}}</p>
                        <p><b>Line1: </b> {{$user->profile->line1}}</p>
                        <p><b>Line2: </b> {{$user->profile->line2}}</p>
                        <p><b>City: </b> {{$user->profile->city}}</p>
                        <p><b>Province: </b> {{$user->profile->province}}</p>
                        <p><b>country: </b> {{$user->profile->country}}</p>
                        <p class="mb-3"><b>Zipcode: </b> {{$user->profile->zipcode}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
