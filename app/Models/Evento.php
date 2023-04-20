<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos'; // Nombre de la tabla en la base de datos
    protected $fillable = ['usuario', 'email', 'tipo_evento', 'navegador', 'is_movil', 'plataforma' ,	'created_at','direccion_ip']; // Columnas que se pueden llenar con datos
    // Define las relaciones con otros modelos si es necesario
}
