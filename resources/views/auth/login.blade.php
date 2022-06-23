@section('title','Login Page')

<x-base-layout>
    <div class="container" style="padding:50px ;margin:auto">
        <div class="row ">
            <div class="col-md-3" ></div>
            <div class="col-md-6">
                <div class="registration-form" >
                    {{-- <x-jet-validation-errors class="mb-4 text-danger bold" /> --}}

                    <form method="POST" action="{{ route('login') }}" class="bg-light">
                        @csrf
                        <div class="form-icon">
                            <span><i class="icon icon-user"></i></span>
                        </div>
                        <div class="form-group mt-5">
                            <input id="email" class="form-control item" type="email" name="email" :value="old('email')" placeholder="{{ __('messages.Email') }}" required autofocus />
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group ">
                            <input id="password" class="form-control item" type="password" name="password" placeholder="{{ __('messages.Password') }}" required autocomplete="current-password" />
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group {{__('messages.text')}}">
                            <label for="remember_me" class=" control-label pl-3 bold text-dark">
                                <input type="checkbox" id="remember_me" name="remember" />
                                <span class="ml-2 text-lg bold">{{ __('messages.Remember me') }}</span>
                            </label>
                        </div>
                        <div class="form-group {{__('messages.text')}}">
                            @if (Route::has('password.request'))
                                <a class="pl-3" href="{{ route('password.request') }}">
                                    {{ __('messages.Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="form-group">
                            <input class="btn btn-block create-account" type="submit" value="{{ __('messages.Login') }}" name="submit"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3" ></div>
        </div>
    </div>

</x-base-layout>

{{--
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}


