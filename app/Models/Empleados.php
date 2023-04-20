<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;
    protected $fillable = ['nombreCompleto', 'correo', 'fechaIngreso', 'fechaSalida', 'fechaNacimiento', 'genero' ];
    

    public function cambiarEstado()
    {
        if ($this->estado == 'activo') {
            $this->estado = 'inactivo';
        } else {
            $this->estado = 'activo';
        }

        $this->save();
    }

    public function departamento()
{
    return $this->belongsTo(Departamento::class, 'id_dep');

}

//Llamamos al nombre del departamento
public function departamentoNombre()
{
    return Departamento::where('id_dep', $this->id_dep)->value('nombre');
}



}
