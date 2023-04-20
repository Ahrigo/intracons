<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;

   
    protected $primaryKey = 'idIncidencia';

    protected $guarded = ['idIncidencia'];
    



//Llamamos al nombre del estado en la tabla

public function proyecto()
{
    return $this->belongsTo(Proyectos::class, 'idProyecto');
}


public function estadoNombre()
{
    return EstadoProyecto::where('idEstadoProyecto', $this->idEstadoProyecto)->value('nombre');
}

public function estadoIncidenciaNombre()
{
    return EstadoIncidencia::where('idEstadoIncidencia', $this->idEstadoIncidencia )->value('nombreIncidencia');
}

public function aprobacionNombre()
{
    return AprobacionIncidencia::where('idAprobacionIncidencia ', $this->idAprobacionIncidencia )->value('nombre');
}


public function supervisorNombre()
{
    return Supervisor::where('idSupervisor', $this->idSupervisor)->value('nombre');
}





}
