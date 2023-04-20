<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;

    

    protected $primaryKey = 'idProyecto';
    


    protected $table = 'proyectos';
    protected $fillable = ['nombreProyecto'];
    
//Llamamos al nombre del estado en la tabla
public function estadoNombre()
{
    return EstadoProyecto::where('idEstadoProyecto', $this->idEstadoProyecto)->value('nombre');
}

public function clienteNombre()
{
    return Cliente::where('idCliente', $this->idCliente)->value('nombre');
}

public function tipoNombre()
{
    return TipoProyecto::where('idTipoProyecto', $this->idTipoProyecto)->value('nombre');
}


public function supervisorNombre()
{
    return Supervisor::where('idSupervisor', $this->idSupervisor)->value('nombre');
}

//Creamos la funcion que llamara a los proyectos completados
public function estadoProyecto()
{
    return $this->belongsTo(EstadoProyecto::class, 'idEstadoProyecto', 'idEstadoProyecto');
}

public function incidencias()
{
    return $this->hasMany(Incidencias::class, 'idProyecto');
}



}
