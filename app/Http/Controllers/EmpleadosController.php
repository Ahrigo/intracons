<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Departamento;


class EmpleadosController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-empleados|crear-empleados|editar-empleados|borrar-empleados', ['only' => ['index']]);
         $this->middleware('permission:crear-empleados', ['only' => ['create','store']]);
         $this->middleware('permission:editar-empleados', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-empleados', ['only' => ['destroy']]);
    }
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $empleados = Empleados::all();
        return view ('empleados.index')->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $departamentos = Departamento::all();
    return view('empleados.crear', compact('departamentos'));
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
        'nombreCompleto' => 'required',
        'correo' => 'required|email|unique:empleados,correo',
        'fechaIngreso' => 'required|date',
        'fechaSalida' => 'nullable|date',
        'fechaNacimiento' => 'required|date|before:' . now()->subYears(18)->format('Y-m-d'), //Validamos que el empleado sea mayor de edad.     
        'id_dep' => 'required', // Agregar validación para el departamento
    ];

    // Opcional: Definir mensajes personalizados para cada regla
    $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
        'unique' => 'El valor del campo :attribute ya está en uso.',
        'date' => 'El campo :attribute debe ser una fecha válida.',
        'before' => 'El empleado debe ser mayor de edad.', //Mostramos el mensaje de la validación

    ];

    // Validar los datos recibidos del formulario
    $request->validate($rules, $messages);




    
    // Si la validación es exitosa, guardar los datos en la base de datos
    $empleados = new Empleados();
    $empleados -> nombreCompleto = $request->get('nombreCompleto');
    $empleados -> correo= $request->get('correo');
    $empleados ->fechaIngreso= $request->get('fechaIngreso');
    $empleados ->fechaSalida= $request->get('fechaSalida');
    $empleados ->fechaNacimiento= $request->get('fechaNacimiento');
    $empleados->id_dep = $request->get('id_dep'); // Agregar el id del departamento seleccionado
    $empleados->save();

    // Redirigir al usuario a la página deseada
    return redirect('/empleados');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleados::find($id);
            
        $departamentos = Departamento::all(); // obtener todos los departamentos
        return view('empleados.editar', compact('empleados', 'departamentos'));
    }
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nombreCompleto' => 'required',
        'correo' => 'required|email|unique:empleados,correo,'.$id,
        'fechaIngreso' => 'required|date',
        'fechaSalida' => 'nullable|date|after_or_equal:fechaIngreso',
        'fechaNacimiento' => 'required|date',
        'departamento' => 'required|exists:departamento,id_dep'
        
    ], [
        'required' => 'El campo :attribute es obligatorio.',
        'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
        'unique' => 'El valor del campo :attribute ya está en uso.',
        'after_or_equal' => 'La fecha de salida debe ser igual o posterior a la fecha de ingreso.',
        'exists' => 'El departamento seleccionado no es válido.'
    ]);

    $empleados = Empleados::find($id);

    $empleados->nombreCompleto = $request->get('nombreCompleto');
    $empleados->correo = $request->get('correo');
    $empleados->fechaIngreso = $request->get('fechaIngreso');
    $empleados->fechaSalida = $request->get('fechaSalida');
    $empleados->fechaNacimiento = $request->get('fechaNacimiento');
    $empleados->id_dep = $request->get('departamento'); // asignar el departamento seleccionado al empleado

    

   

    
    $empleados->save();

    return redirect('/empleados');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleados= Empleados::find($id);
        $empleados->delete();
        return redirect('/empleados');
    }





    //Creamos la funcion para cambiar el estado desde el label de la tabla estado
    public function cambiarEstadoEmpleado($id)
    {
        $empleados = Empleados::find($id);
        $empleados->estado = $empleados->estado == 'ACTIVO' ? 'INACTIVO' : 'ACTIVO';
        $empleados->save();
    
        return redirect()->back()->with('success', '¡Estado del empleado cambiado correctamente!');
    }
    

}
