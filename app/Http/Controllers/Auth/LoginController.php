<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Anhskohbo\NoCaptcha\NoCaptcha;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $captcha;

    public function __construct(NoCaptcha $captcha)
    {
        $this->middleware('guest')->except('logout');
        $this->captcha = $captcha;
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'g-recaptcha-response' => ['required', $this->captcha],
        ]);
    }

  
protected function messages()
{
    return [
        'email.required' => 'El correo electrónico es obligatorio',
        'email.email' => 'Ingresa un correo electrónico válido',
        'password.required' => 'La contraseña es obligatoria',
    ];
}

public function login(Request $request)
{
    $this->validateLogin($request);

    // Si las credenciales son válidas, intenta iniciar sesión
    if ($this->attemptLogin($request)) {
        return $this->sendLoginResponse($request);
    }

    // Si las credenciales no son válidas, muestra un mensaje de error
    return back()
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors([
            $this->username() => trans('auth.failed'),
        ]);
}

}
