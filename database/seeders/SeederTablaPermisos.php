<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla empleados
            'ver-empleados',
            'crear-empleados',
            'editar-empleados',
            'borrar-empleados',

            //Operacions sobre tabla usuarios
            'ver-usuarios',
            'crear-usuarios',
            'editar-usuarios',
            'borrar-usuarios',

            //Operacions sobre tabla proyectos
            'ver-proyectos',
            'crear-proyectos',
            'editar-proyectos',
            'borrar-proyectos',

            //Operacions sobre tabla incidencias
            'ver-incidencias',
            'crear-incidencias',
            'editar-incidencias',
            'borrar-incidencias',

            'opp',
            'rrhh'
            
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}