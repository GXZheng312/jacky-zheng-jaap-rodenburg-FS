<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.basic.head')
</head>

<body>
    <div class="d-flex justify-content-center align align-items-center vh-100 vw-100">
        <div class="card text-center w-25">
            <div class="card-header">
                <h3 class="m-3"> Inloggen </h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('login')]) }}
                    <div class="form-floating mb-3">
                        {{ Form::email('email', old('soortgerecht_id'), ['class' => 'form-control', 'placeholder' => 'name@example.com']) }}
                        {{ Form::label('email', 'Email') }}
                  </div>

                  <div class="form-floating mb-3">
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                    {{ Form::label('password', 'Password') }}
                  </div>
                  
                {{ Form::submit('Inloggen', ['type' => 'submit','class' => 'btn btn-outline-primary']) }}
                {{ Form::close() }}
            </div>
            <div class="card-footer text-muted">
                Gemaakt door Jacky Zheng :)
            </div>
        </div>
    </div>
</body>

</html>


{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
