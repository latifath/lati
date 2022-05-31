@extends('layouts.master')
@section('register')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-1 card p-5" style="background-color: #EDF1FF;">
                <h1 style="text-align: center;">Inscription</h1>

                <x-jet-validation-errors class="mb-4 text-danger" />

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Nom')  }}</label>
                        <x-jet-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <x-jet-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                        <x-jet-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('Confirmation Mot de passe') }}</label>
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Terms of Service') . '</a>',
                                    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-600 hover:text-gray-900">' . __('Privacy Policy') . '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                    @endif

                    <div class="flex float-right mt-4">
                        <a class=" me-md-4" href="{{ route('login') }}">
                            {{ __('Déjà inscrit?') }}
                        </a>

                        <x-jet-button class="ml-4 btn btn-primary">
                            {{ __('S\'inscrire') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection







