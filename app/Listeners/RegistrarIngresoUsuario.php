<?php

namespace App\Listeners;

use App\Events\UsuarioAutenticado;
use Illuminate\Support\Facades\Log;

class RegistrarIngresoUsuario
{
    /**
     * Handle the event.
     *
     * @param  UsuarioAutenticado  $event
     * @return void
     */
    public function handle(UsuarioAutenticado $event)
    {
        // Acceder a la información del evento
        $usuario = $event->usuario;
        $navegador = $event->navegador;
        $direccionIP = $event->direccionIP;

        // Realizar acciones con la información del evento
        // Por ejemplo, guardar en la base de datos
        Log::info('El usuario con ID '.$usuario->id.' se autenticó con el navegador '.$navegador.' y la dirección IP '.$direccionIP);

        // Retornar la vista bitacora.blade.php con los datos a mostrar en la tabla
        return view('ruta_de_tu_vista.bitacora', [
            'usuario' => $usuario,
            'navegador' => $navegador,
            'direccionIP' => $direccionIP,
        ]);
    }
}
