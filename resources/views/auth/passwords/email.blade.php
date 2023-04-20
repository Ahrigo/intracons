@extends('adminlte::email.layout')

@section('content')
    <p>{{ __('You are receiving this email because we received a password reset request for your account.') }}</p>
    <p>{{ __('Please click the button below to reset your password:') }}</p>

    <p style="text-align: center;">
        <a href="{{ $actionUrl }}" class="btn btn-primary">{{ __('Reset Password') }}</a>
    </p>

    <p>{{ __('If you did not request a password reset, no further action is required.') }}</p>
@endsection
