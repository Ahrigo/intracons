<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Auth\Authenticatable;

class UsuarioAutenticado
{
    use Dispatchable, SerializesModels;

    public $usuario;
    public $navegador;
    public $direccionIP;

    /**
     * Create a new event instance.
     *
     * @param Authenticatable $usuario
     * @param string $navegador
     * @param string $direccionIP
     * @return void
     */
    public function __construct(Authenticatable $usuario, $navegador, $direccionIP)
    {
        $this->usuario = $usuario;
        $this->navegador = $navegador;
        $this->direccionIP = $direccionIP;
    }
}
