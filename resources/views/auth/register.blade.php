@extends('layouts.auth')
@section('title', translate('Sign Up', 'auth'))
@section('content')
    <div class="sign">
        <div class="card-v">
            <div class="sign-header mb-4">
                <h4>{{ translate('Sign Up', 'auth') }}</h4>
                <p class="text-muted mb-0">{{ translate('Enter your details to create an account.', 'auth') }}</p>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ translate('Email address', 'forms') }}</label>
                    <input type="email" name="email" class="form-control form-control-md" value="{{ old('email') }}"
                        required />
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ translate('Password', 'forms') }}</label>
                    <input type="password" name="password" class="form-control form-control-md" minlength="8" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ translate('Confirm password', 'forms') }}</label>
                    <input type="password" name="password_confirmation" class="form-control form-control-md" minlength="8"
                        required>
                </div>
                @if ($settings->general->terms_link)
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terms" id="terms"
                                {{ old('terms') ? 'checked' : '' }}>
                            <label class="form-check-label" for="terms">
                                {{ translate('I agree to the', 'auth') }}
                                <a
                                    href="{{ $settings->general->terms_link }}">{{ translate('Terms of service', 'auth') }}</a>
                            </label>
                        </div>
                    </div>
                @endif
                <x-captcha />
                <button class="btn btn-primary btn-md w-100">{{ translate('Sign Up', 'auth') }}</button>
            </form>
            <x-oauth-buttons />
        </div>
    </div>
@endsection
