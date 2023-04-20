<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{

    use HasFactory;

    //Llamamos a la tabla y al nombre para mostrarlo en el formulario
    protected $table = 'supervisor';
    protected $fillable = ['nombre'];
    
    
}