@section('title','Reset Password Page')

<x-base-layout>
    <div class="container" style="padding:50px;margin:auto">
        <div class="row">
            <div class="col-md-3" ></div>
            <div class="col-md-6">
                <div class="registration-form">
                    <x-jet-validation-errors class="mb-4 text-danger bold" />

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="form-icon">
                            <span><i class="icon icon-user"></i></span>
                        </div>
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group">
                            <input id="email" class="form-control item" type="email" name="email" placeholder="{{ __('messages.Email') }}" :value="old('email', $request->email)" required autofocus />
                        </div>

                        <div class="form-group ">
                            <input id="password" class="form-control item" type="password" name="password" placeholder="{{ __('messages.Password') }}" required autocomplete="new-password" />
                        </div>

                        <div class="form-group">
                            <input id="password_confirmation" class="form-control item" type="password" name="password_confirmation" placeholder="{{ __('messages.Confirm Password') }}" required autocomplete="new-password"/>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-block create-account" type="submit" value="{{ __('messages.Reset Password') }}" name="submit"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3" ></div>
        </div>
    </div>
    <style>
        body{
            background-color: #dee9ff;
        }

        .registration-form{
            padding: 50px 0;
        }

        .registration-form form{
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            padding: 20px 70px;
            border-radius: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .form-icon{
            text-align: center;
            background-color: #5891ff;
            border-radius: 50%;
            font-size: 40px;
            color: white;
            width: 100px;
            height: 100px;
            margin: auto;
            margin-bottom: 20px;
            line-height: 100px;
        }

        .registration-form .item{
            border-radius: 20px;
            margin-bottom: 25px;
            padding: 10px 20px;
        }

        .registration-form .create-account{
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #5791ff;
            border: none;
            color: white;
            margin-top: 20px;
        }



        @media (max-width: 576px) {
            .registration-form form{
                padding: 50px 20px;
            }

            .registration-form .form-icon{
                width: 70px;
                height: 70px;
                font-size: 30px;
                line-height: 70px;
            }
        }
    </style>
</x-base-layout>


{{--<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}
