<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\IncidenciasController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\LogViewerController;
use App\Http\Controllers\HighchartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/home', function (){
    return view ('home');
});


//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('articulo', ArticuloController::class);
    Route::resource('empleados', EmpleadosController::class);
    Route::resource('proyectos', ProyectosController::class);
    Route::resource('incidencias', IncidenciasController::class);
    Route::resource('Auth', ResetPasswordController::class);
    Route::resource('home', HomeController::class);
    Route::resource('bitacora', BitacoraController::class);


});



Route::group(['middleware' => ['auth', 'prevent-back-history']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('articulo', ArticuloController::class);
    Route::resource('empleados', EmpleadosController::class);
    Route::resource('proyectos', ProyectosController::class);
    Route::resource('incidencias', IncidenciasController::class);
    Route::resource('Auth', ResetPasswordController::class);
    Route::resource('home', HomeController::class);
    Route::resource('bitacora', BitacoraController::class);

    
});


Route::post('/', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('home');
    }
    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas no son válidas.',
    ]);
})->name('login.post');


Route::get('/bitacora', [BitacoraController::class, 'index']);



Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('log-viewer');

Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

//Creamos la ruta para ejecutar el cambio del estdo
Route::get('/cambiar-estado-empleado/{id}', [EmpleadosController::class, 'cambiarEstadoEmpleado']);

// // Procesamiento del restablecimiento de contraseña
// Route::post('reset-password', [App\Http\Controllers\Auth\NewPasswordController::class, 'store'])->name('password.update');

// Mostrar formulario de restablecimiento de contraseña
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Actualizar la contraseña
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'resetPassword'])->name('password.update');


Route::delete('/eventos/{id}', [BitacoraController::class, 'destroy'])->name('eventos.destroy');
Route::post('/empleados', [EmpleadosController::class, 'store'])->name('empleados.store');
Route::post('/proyectos', [ProyectosController::class, 'store'])->name('proyectos.store');
Route::post('/incidencias', [IncidenciasController::class, 'store'])->name('incidencias.store');
Route::get('/proyectos/{idProyecto}', [ProyectosController::class, 'show'])->name('proyectos.show');

//Esta ruta llama a los proyectos completados para poder verlos en incidencias
Route::get('/proyectos/estadoProyecto', 'IncidenciasController@getEstadoProyecto')->name('proyectos.getEstadoProyecto');


//Route::get('/home', [HighchartController::class, 'handleChart']);

//Route::get('/home', [HighchartController::class, 'combinedChart']);


Route::get('/home', [HighchartController::class, 'combinedChart'])->name('home.combinedChart');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
//    Route::get('permisos', [Seguridad\PermisosController::class, 'index'])->name('permisos.index');
//});
