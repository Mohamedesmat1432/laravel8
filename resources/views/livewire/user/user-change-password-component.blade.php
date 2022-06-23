@section('title','Changepassword Page')

<section>
    <div class="container p-5">
        <div class="row">
            @if(Session::has('message_success'))
                <div class="alert alert-succss alert-dismissible alert-white rounded">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="icon">
                        <i class="bi bi-check"></i>
                    </div>
                    <strong>Success!</strong>
                    {{Session::get('message_success')}}
                </div>
            @endif
            @if(Session::has('message_error'))
                <div class="alert alert-danger alert-dismissible alert-white rounded">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="icon">
                        <i class="bi bi-x-circle"></i>
                    </div>
                    <strong>Success!</strong>
                    {{Session::get('message_error')}}
                </div>
            @endif
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="registration-form">
                    <form wire:submit.prevent="changePassword" class="bg-light">
                        @csrf
                        <div class="form-icon">
                            <span><i class="icon icon-key"></i></span>
                        </div>
                        <div class="form-group">
                            <input id="current_password" class="form-control item" type="password" name="current_password" placeholder="{{__('messages.Current Password')}}" wire:model="current_password"/>
                            @error('current_password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" class="form-control item" type="password" name="password" placeholder="{{__('messages.Password')}}" wire:model="password"/>
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input id="password_confirmation" class="form-control item" type="password" name="password_confirmation"  placeholder="{{__('messages.Password Confirmation')}}" wire:model="password_confirmation"/>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-block create-account " type="submit" value="{{ __('messages.Update') }}" name="submit"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
