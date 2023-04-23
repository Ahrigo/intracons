<?php

namespace App\Http\Controllers;

use App\Models\Evento; // Importar el modelo 'Evento'
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BitacoraController extends Controller
{

    public function index(Request $request)
    {
        $eventos = Evento::all(); // Obtener todos los registros de la tabla de eventos

        // Crear una instancia de la clase Agent
        $agent = new Agent();

        // Obtén el agente de usuario del cliente
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // Configura el agente de usuario en la clase Agent
        $agent->setUserAgent($userAgent);

        // Obtén el nombre del navegador
        $browserName = $agent->browser();

        // Obtén el tipo de dispositivo del cliente
        $tipoDispositivo = $agent->device();

        // Obtén la dirección IP del cliente
        $direccionIp = $_SERVER['REMOTE_ADDR'];

        // Obtén el nombre de usuario y correo electrónico autenticado
        $usuario = Auth::user();
        $nombreUsuario = $usuario ? $usuario->name : null;
        $correoUsuario = $usuario ? $usuario->email : null;
        $esMovil = $agent->isMobile();
        $plataforma = $agent->platform();       
        $evento = new Evento();
        $evento->usuario = $nombreUsuario;
        $evento->correo = $correoUsuario;
        $evento->navegador = $browserName;
        $evento->tipo_dispositivo = $esMovil ? 'Móvil' : 'PC/Otro';
        $evento->plataforma = $plataforma; // Agregar la plataforma del dispositivo
        $evento->tipo_dispositivo = $tipoDispositivo;
        $evento->created_at = now(); // Asignar la fecha y hora actual a la columna created_at
        $evento->direccion_ip = $direccionIp;
        $evento->save();

        // Pasar los datos a la vista, incluyendo el nombre del navegador, la dirección IP, el nombre de usuario y el correo electrónico
        return view('bitacora.bitacora')->with('eventos', $eventos)
                                       ->with('browserName', $browserName)
                                       ->with('esMovil', $esMovil)
                                       ->with('plataforma', $plataforma)
                                       ->with('tipoDispositivo', $tipoDispositivo)
                                       ->with('fechaInicioSesion', $evento->created_at)
                                       ->with('direccionIp', $direccionIp)
                                       ->with('nombreUsuario', $nombreUsuario)
                                       ->with('correoUsuario', $correoUsuario);
    }
    public function destroy(string $id)
    {
        $evento = Evento::find($id); // Buscar el evento por su ID
        if ($evento) {
            $evento->delete(); // Eliminar el evento
            return redirect('/bitacora')->with('success', 'Evento eliminado exitosamente'); // Redirigir con un mensaje de éxito
        } else {
            return redirect('/bitacora')->with('error', 'No se encontró el evento'); // Redirigir con un mensaje de error si no se encuentra el evento
        }
    
    }
}
