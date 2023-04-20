@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Empleado</h1>
    
@stop

@section('content')
 
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Formulario Empleado</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
   
  
  <div class="mb-3">
  <form id="formEmpleados" action="/empleados/{{$empleados->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="nombreCompleto" class="form-label">Nombre Completo</label>
    <input id="nombreCompleto" name="nombreCompleto" type="text" class="form-control @error('nombreCompleto') is-invalid @enderror" value="{{$empleados->nombreCompleto}}" tabindex="1">
    @error('nombreCompleto')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="correo" class="form-label">Correo</label>
    <input id="correo" name="correo" type="text" class="form-control @error('correo') is-invalid @enderror" value="{{$empleados->correo}}" tabindex="2">
    @error('correo')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="fechaIngreso" class="form-label">Fecha Ingreso</label>
    <input type= "date" id="fechaIngreso" name="fechaIngreso" type="number" class="form-control @error('fechaIngreso') is-invalid @enderror" value="{{ date('Y-m-d', strtotime($empleados->fechaIngreso)) }}" tabindex="3">
    @error('fechaIngreso')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="fechaSalida" class="form-label">Fecha Salida</label>
    <input type= "date" id="fechaSalida" name="fechaSalida" type="text" class="form-control @error('fechaSalida') is-invalid @enderror" value="{{ $empleados->fechaSalida ? date('Y-m-d', strtotime($empleados->fechaSalida)) : 'No especificado' }}" tabindex="3">
    @error('fechaSalida')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="fechaNacimiento" class="form-label">Fecha Nacimiento</label>
    <input type= "date" id="fechaNacimiento" name="fechaNacimiento" type="text" class="form-control @error('fechaNacimiento') is-invalid @enderror" value="{{ date('Y-m-d', strtotime($empleados->fechaNacimiento)) }}" tabindex="3">
    @error('fechaNacimiento')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
  <label for="departamento" class="form-label">Departamento</label>
  <select id="departamento" name="departamento" class="form-control @error('departamento') is-invalid @enderror" tabindex="5">
    <option value="">Selecciona un departamento</option>
    @foreach($departamentos as $departamento)
      <option value="{{$departamento->id_dep}}" {{$empleados->id_dep == $departamento->id_dep ? 'selected' : ''}}>{{$departamento->nombre}}</option>
    @endforeach
  </select>
  @error('departamento')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>


  <div class="float-right">
  <a href="/empleados" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" id="btnGuardar" class="btn btn-primary" tabindex="4">Guardar</button>
  </div>

</form>


</div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      
    </section>
@stop

@section('css')
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">



@stop

@section('js')
<!-- Para incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Para incluir SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

<script>
    $(document).ready(function() {
    $('#btnGuardar').click(function() {
        $.ajax({
            type: "POST",
            url: "{{ route('empleados.update', $empleados->id) }}", //Es importante la ruta para el mensaje
            data: $('#formEmpleados').serialize(),
            success: function(response) {
                Swal.fire({
                    title: 'Edición Exitosa',
                    text: 'El empleado ha sido editado con éxito',
                    icon: 'success',
                    timer: 5000,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                $('#formEmpleados')[0].reset();
                window.location.href = '/empleados';
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error',
                    text: 'Ha ocurrido un error al editar el empleado',
                    icon: 'error',
                    timer: 5000,
                    showCancelButton: false,
                    showConfirmButton: false
                });
            }
        });
    });
});

</script>




@stop