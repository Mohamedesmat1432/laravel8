@section('title','Register Page')

<x-base-layout>
    <div class="container x" style="padding:50px;margin:auto">
        <div class="row">
            <div class="col-md-3" ></div>
            <div class="col-md-6">
                <div class="registration-form">
                    {{-- <x-jet-validation-errors class="mb-4 text-danger bold" /> --}}

                    <form method="POST" action="{{ route('register') }}" class="bg-light">
                        @csrf
                        <div class="form-icon">
                            <span><i class="icon icon-user"></i></span>
                        </div>
                        <div class="form-group mt-5">
                            <input id="name" class="form-control item" type="text" name="name" :value="old('name')"  placeholder="{{ __('messages.Name') }}" required autofocus autocomplete="name" />
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" class="form-control item" type="email" name="email" :value="old('email')" placeholder="{{ __('messages.Email') }}" autofocus />
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group ">
                            <input id="password" class="form-control item" type="password" name="password" placeholder="{{ __('messages.Password') }}" autocomplete="current-password" />
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <input id="password_confirmation" class="form-control item" type="password" name="password_confirmation" placeholder="{{ __('messages.Confirm Password') }}" required autocomplete="new-password" />
                            @error('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="form-group">
                                <label for="terms">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="terms" id="terms"/>

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                <label>
                            </div>
                        @endif
                        <div class="form-group {{__('messages.text')}}">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                <span class="pl-3">{{ __('messages.Already registered?') }}</span>
                            </a>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-block create-account" type="submit" value="{{ __('messages.Register') }}" name="submit"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</x-base-layout>
{{--
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}

