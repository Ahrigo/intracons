@extends('adminlte::auth.login')

@section('title', 'Construtec')


@section('head')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@stop



@section('auth_body')
<div class="card-body">
<form id="login-form" action="{{ route('login') }}" method="post">
{{ csrf_field() }}

<div class="input-group mb-3">
    <input type="email" name="email" class="form-control" placeholder="Correo" value="{{ old('email') }}" required autofocus>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>



        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        

        <!-- Add the reCAPTCHA widget -->
        <div class="form-group">
    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" id="custom-recaptcha"></div>
</div>
<p></p>


        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">
                        Recordarme
                    </label>
                </div>
            </div>


            @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </div>
        </div>
    </form>

    
@stop

@section('css')
    <style>
        body {
            background-image: url('https://static.vecteezy.com/system/resources/previews/000/116/304/original/free-construction-background-vector.jpg');
          
        }
    </style>

<style>
#custom-recaptcha {
    /* Estilos personalizados */
    width: 170px; /* Ancho personalizado */
    height: 70px; /* Alto personalizado */
    transform: scale(0.8); /* Escala personalizada */
    /* ... otros estilos personalizados ... */
    </style>
}


@stop


@section('js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
    $(function () {
        var loginForm = $('#login-form');

        // Validar el formulario antes de enviar
        loginForm.submit(function (event) {
            var recaptchaResponse = grecaptcha.getResponse();

            if (recaptchaResponse.length === 0) {
                event.preventDefault();
                alert('Por favor, completa la verificación reCAPTCHA.');
            }
        });
    });
</script>

@stop
