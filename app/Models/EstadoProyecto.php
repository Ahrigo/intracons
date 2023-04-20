<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoProyecto extends Model
{

    use HasFactory;

    //Llamamos a la tabla y al nombre para mostrarlo en el formulario
    protected $table = 'estadoproyecto';
    protected $fillable = ['nombre'];
    
    
}