@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', __('¿Olvidaste tu contraseña? '))

@section('auth_body')
<div class=" mb-4 text-sm">
        {{ __('No hay problema, háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.') }}
    </div>


    @if (session('status'))
    <div class="mb-4 font-medium text-sm alert alert-success">
        {{ session('status') }}
    </div>
@endif
    
    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf


        <div class="form-group">
    <div class="input-group mb-3 rounded">
       
        <x-label for="email" value="{{ __('Correo') }}" class="sr-only"/>
        <x-input id="email" class="form-control rounded" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{ __('Correo') }}" />
        <div class="input-group-append">
            <div class="input-group-text rounded">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 d-flex">
        <button type="submit" class="btn btn-primary flex-grow-1 rounded">{{ __('Enviar') }}</button>
        <button type="button" onclick="location.href='{{ route('login') }}'" class="btn btn-light rounded ml-2">
            <span class="fas fa-sign-in-alt"></span>
            {{ __('Inicio de Sesión') }}
        </button>
    </div>
</div>

    </form>
@endsection


@section('css')
    <style>
        body {
            background-image: url('https://static.vecteezy.com/system/resources/previews/000/116/304/original/free-construction-background-vector.jpg');
          
        }
    </style>
@stop