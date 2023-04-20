<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoIncidencia extends Model
{
    use HasFactory;

    //Llamamos a la tabla y al nombre para mostrarlo en el formulario
    protected $table = 'estadoincidencias';
    protected $fillable = ['nombreIncidencia'];
}
