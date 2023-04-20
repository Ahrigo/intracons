<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencias;
use App\Models\Proyectos;
use App\Models\Supervisor;
use App\Models\EstadoProyecto;
use App\Models\EstadoIncidencia;
use App\Models\AprobacionIncidencia;


class IncidenciasController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:ver-incidencias|crear-incidencias|editar-incidencias|borrar-incidencias', ['only' => ['index']]);
         $this->middleware('permission:crear-incidencias', ['only' => ['create','store']]);
         $this->middleware('permission:editar-incidencias', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-incidencias', ['only' => ['destroy']]);
    }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
        $incidencias = Incidencias::all();
        return view ('incidencias.index')->with('incidencias', $incidencias);
    }

    /**
    * Display a listing of the resource.
    *
    */

    public function create()
    {

        $proyectos = Proyectos::whereHas('estadoProyecto', function ($query) {
            $query->where('nombre', '=', 'Completado');
        })->get();
        
        $aprobacionincidencias = AprobacionIncidencia::all();
        $estadoincidencias = EstadoIncidencia::all();
        $supervisores = Supervisor::all();
        
        return view ('incidencias.crear', compact('proyectos', 'aprobacionincidencias', 'estadoincidencias', 'supervisores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $rules = [
            
            'idProyecto' => 'required',
            'descripcion' => 'required|unique:incidencias',
            'fechaReporte' => 'required|date',
            'fechaCierreReporte' => 'nullable|date|after_or_equal:fechaReporte',
            'idSupervisor' => 'required',
            'idEstadoIncidencia' => 'required',
            
            
    ];

    // Opcional: Definir mensajes personalizados para cada regla
    $messages = [
        'required' => 'El campo es obligatorio.',
        'unique' => 'La descripción debe ser diferente.',
        'date' => 'Debe agregar una fecha válida.',
        'after' => 'El campo debe ser una fecha posterior a la de inicio.', //Mostramos el mensaje de la validación de fecha finalizacion
    ];

    // Validar los datos recibidos del formulario
    $request->validate($rules, $messages);


    // Si la validación es exitosa, guardar los datos en la base de datos
    $incidencias = new Incidencias();

    $incidencias->idProyecto = $request->get('idProyecto'); 
    $incidencias->descripcion = $request->get('descripcion');
    $incidencias->fechaReporte = $request->get('fechaReporte');
    $incidencias->fechaCierreReporte = $request->get('fechaCierreReporte');
    $incidencias->idAprobacionIncidencia = $request->get('idAprobacionIncidencia');
    $incidencias->idEstadoIncidencia = $request->get('idEstadoIncidencia');
    $incidencias->idSupervisor = $request->get('idSupervisor'); 
    $incidencias->solucion = $request->get('solucion'); 


    $incidencias->save();
    

    // Redirigir al usuario a la página deseada
    return redirect('/incidencias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idIncidencia
     * @return \Illuminate\Http\Response
     */
    public function show(string $idIncidencia)
    {
        //
    }

    /**
     *  * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idIncidencia
     * @return \Illuminate\Http\Response
     */
     
    public function edit($idIncidencia)
    {
        $incidencias = Incidencias::find($idIncidencia);

        $proyectos = Proyectos::whereHas('estadoProyecto', function ($query) {
            $query->where('nombre', '=', 'Completado');
        })->get();
        
        $aprobacionincidencias = AprobacionIncidencia::all();
        $estadoincidencias = EstadoIncidencia::all();
        $supervisores = Supervisor::all();
        
        return view ('incidencias.editar', compact('incidencias','proyectos', 'aprobacionincidencias', 'estadoincidencias', 'supervisores'));

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idIncidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idIncidencia)
    {
        
        $request->validate([

            'idProyecto' => 'required',
            'descripcion' => 'required',
            'fechaReporte' => 'required|date',
            'fechaCierreReporte' => 'nullable|date|after_or_equal:fechaReporte',
            'idSupervisor' => 'required',
            'idEstadoIncidencia' => 'required',


        ], [
            'required' => 'El campo es obligatorio.',
            'date' => 'Debe agregar una fecha válida.',
            'after' => 'El campo debe ser una fecha posterior a la de inicio.', //Mostramos el mensaje de la validación de fecha finalizacion

        ]);

        $incidencias = Incidencias::find($idIncidencia);

        $incidencias->idProyecto = $request->get('idProyecto'); 
        $incidencias->descripcion = $request->get('descripcion');
        $incidencias->fechaReporte = $request->get('fechaReporte');
        $incidencias->fechaCierreReporte = $request->get('fechaCierreReporte');
        $incidencias->idAprobacionIncidencia = $request->get('idAprobacionIncidencia');
        $incidencias->idEstadoIncidencia = $request->get('idEstadoIncidencia');
        $incidencias->idSupervisor = $request->get('idSupervisor'); 
        $incidencias->solucion = $request->get('solucion'); 
        $incidencias->save();
    
        return redirect('/incidencias');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idIncidencia)
    {
        $incidencias= Incidencias::find($idIncidencia);
        $incidencias->delete();
        return redirect('/incidencias');
    }



}
