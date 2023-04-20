<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyectos;
use App\Models\Cliente;
use App\Models\Supervisor;
use App\Models\TipoProyecto;
use App\Models\EstadoProyecto;


class ProyectosController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:ver-proyectos|crear-proyectos|editar-proyectos|borrar-proyectos', ['only' => ['index']]);
         $this->middleware('permission:crear-proyectos', ['only' => ['create','store']]);
         $this->middleware('permission:editar-proyectos', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-proyectos', ['only' => ['destroy']]);
    }


   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */


    public function index()
    {
        $proyectos = Proyectos::all();
        return view ('proyectos.index')->with('proyectos', $proyectos);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $supervisores = Supervisor::all();
        $tipoproyectos = TipoProyecto::all();
        $estadoproyectos = EstadoProyecto::all();
        return view ('proyectos.crear', compact('clientes', 'supervisores', 'tipoproyectos', 'estadoproyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Definir las reglas de validación para cada campo
    $rules = [
            'nombreProyecto' => 'required|unique:proyectos',
            'descripcion' => 'required',
            'fechaInicio' => 'required|date',
            'fechaFinalizacion' => 'required|date|after:fechaInicio',
            'duracionMeses' => 'required',
            'montoOferta' => 'required',
            'idCliente' => 'required',
            'idSupervisor' => 'required',
            'idTipoProyecto' => 'required',
            'idEstadoProyecto' => 'required', // Agregar validación para el departamento
    ];

    // Opcional: Definir mensajes personalizados para cada regla
    $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'unique' => 'El nombre del proyecto :input ya está en uso.',
        'date' => 'El campo :attribute debe ser una fecha válida.',
        'after' => 'El campo :attribute debe ser una fecha posterior a la de inicio.', //Mostramos el mensaje de la validación de fecha finalizacion
    ];

    // Validar los datos recibidos del formulario
    $request->validate($rules, $messages);


    // Si la validación es exitosa, guardar los datos en la base de datos
    $proyectos = new Proyectos();
    $proyectos->nombreProyecto = $request->get('nombreProyecto');
    $proyectos->descripcion = $request->get('descripcion');
    $proyectos->fechaInicio = $request->get('fechaInicio');
    $proyectos->fechaFinalizacion = $request->get('fechaFinalizacion');
    $proyectos->duracionMeses = $request->get('duracionMeses');
    $proyectos->montoOferta = $request->get('montoOferta');

    $proyectos->idCliente = $request->get('idCliente'); 
    $proyectos->idSupervisor = $request->get('idSupervisor'); 
    $proyectos->idTipoProyecto = $request->get('idTipoProyecto'); 
    $proyectos->idEstadoProyecto = $request->get('idEstadoProyecto'); 
    $proyectos->documentos = $request->get('documentos'); 


    $proyectos->save();

    // Redirigir al usuario a la página deseada
    return redirect('/proyectos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idProyecto
     * @return \Illuminate\Http\Response
     */
    public function show(string $idProyecto)
    {
        $proyectos = Proyectos::find($idProyecto);
        // dd($proyectos);
        return view ('proyectos.show', compact('proyectos'));

    }
/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idProyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($idProyecto)
    {
        $proyectos = Proyectos::find($idProyecto);

        $clientes = Cliente::all();
        $supervisores = Supervisor::all();
        $tipoproyectos = TipoProyecto::all();
        $estadoproyectos = EstadoProyecto::all();
        return view ('proyectos.editar', compact('proyectos','clientes', 'supervisores', 'tipoproyectos', 'estadoproyectos'));


    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idProyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idProyecto)
    {

       

        $request->validate([
            'nombreProyecto' => 'required',
            'descripcion' => 'required',
            'fechaInicio' => 'required|date',
            'fechaFinalizacion' => 'required|date',
            'duracionMeses' => 'required',
            'montoOferta' => 'required',
            'cliente' => 'required|exists:cliente,idCliente',
            'supervisor' => 'required|exists:supervisor,idSupervisor',
            'tipoproyecto' => 'required|exists:tipoproyecto,idTipoProyecto',
            'estadoproyecto' => 'required|exists:estadoproyecto,idEstadoProyecto',

        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'unique' => 'El valor del campo :attribute ya está en uso.',
            'after_or_equal' => 'La fecha de salida debe ser igual o posterior a la fecha de ingreso.',
            'exists' => 'El departamento seleccionado no es válido.'
        ]);
       
        $proyectos = Proyectos::find($idProyecto);
    
        $proyectos->nombreProyecto = $request->get('nombreProyecto');
        $proyectos->descripcion = $request->get('descripcion');
        $proyectos->fechaInicio = $request->get('fechaInicio');
        $proyectos->fechaFinalizacion = $request->get('fechaFinalizacion');
        $proyectos->duracionMeses = $request->get('duracionMeses');
        $proyectos->montoOferta = $request->get('montoOferta');
        $proyectos->idCliente = $request->get('cliente'); 
        $proyectos->idSupervisor = $request->get('supervisor'); 
        $proyectos->idTipoProyecto = $request->get('tipoproyecto'); 
        $proyectos->idEstadoProyecto = $request->get('estadoproyecto'); 
        $proyectos->save();
    
        return redirect('/proyectos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idProyecto)
    {
        $proyectos= Proyectos::find($idProyecto);
        $proyectos->delete();
        return redirect('/proyectos');
    }


    



}
