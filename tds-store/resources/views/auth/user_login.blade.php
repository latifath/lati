@extends('layouts.master')

@section('login')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 card p-5" style="background-color: #EDF1FF;">
                <h1 style="text-align: center;">Connexion</h1>

                <x-jet-validation-errors class="mb-4 text-danger" />

                @if (session('status'))
                    <div class="mb-4 font-weight-medium text-sm text-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <x-jet-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                   </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                        <x-jet-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                        </label>
                    </div>
                    <div class="flex float-right mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-jet-button class="ml-4 btn btn-primary">
                            {{ __('Se Connecter') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
{{-- --}}
