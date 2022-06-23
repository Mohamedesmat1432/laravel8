@section('title','Forget Password Page')

<x-base-layout>
    <div class="container" style="padding:50px;margin:auto">
        <div class="row">
            <div class="col-md-3" ></div>
            <div class="col-md-6">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="registration-form">
                    <x-jet-validation-errors class="mb-4 text-danger bold" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-icon">
                            <span><i class="bi bi-envelope-fill"></i></span>
                        </div>
                        <div class="form-group mt-5">
                            <input id="email" class="form-control item" type="email" name="email" placeholder="{{ __('messages.Email') }}" :value="old('email')" required autofocus />
                        </div>
                        <div class="form-group">
                            <input class="btn btn-block create-account" type="submit" value="{{ __('messages.Send Email') }}" name="submit"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3" ></div>
        </div>
    </div>

</x-base-layout>



{{--<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
--}}
