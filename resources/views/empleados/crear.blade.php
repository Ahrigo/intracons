@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar Empleado</h1>
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
              
  
            <form id="formEmpleados" action="/empleados" method="POST">

  @csrf
  <div class="mb-3">
    <label for="nombreCompleto" class="form-label">Nombre Completo</label>
    <input id="nombreCompleto" name="nombreCompleto" type="text" class="form-control @error('nombreCompleto') is-invalid @enderror" value="{{ old('nombreCompleto') }}" tabindex="1">
    @error('nombreCompleto')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="correo" class="form-label">Correo</label>
    <input id="correo" name="correo" type="text" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" tabindex="2">
    @error('correo')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="fechaIngreso" class="form-label">Fecha Ingreso</label>
    <input type="date" id="fechaIngreso" name="fechaIngreso" type="number" class="form-control @error('fechaIngreso') is-invalid @enderror" value="{{ old('fechaIngreso') }}" tabindex="3">
    @error('fechaIngreso')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="fechaSalida" class="form-label">Fecha Salida</label>
    <input type="date" id="fechaSalida" name="fechaSalida" type="text" class="form-control @error('fechaSalida') is-invalid @enderror" value="{{ old('fechaSalida') }}" tabindex="4">
    @error('fechaSalida')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="fechaNacimiento" class="form-label">Fecha Nacimiento</label>
    <input type="date" id="fechaNacimiento" name="fechaNacimiento" type="text" class="form-control @error('fechaNacimiento') is-invalid @enderror" value="{{ old('fechaNacimiento') }}" tabindex="5">
    @error('fechaNacimiento')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
  <label for="departamento" class="form-label">Departamento</label>
  <select id="id_dep" name="id_dep" class="form-control @error('id_dep') is-invalid @enderror" tabindex="5">
    <option value="">Seleccione un departamento</option>
    @foreach($departamentos as $departamento)
        <option value="{{ $departamento->id_dep }}" @if(old('id_dep') == $departamento->id_dep) selected @endif>{{ $departamento->nombre }}</option>
    @endforeach
</select>


</div>





  
  <div class="float-right">
  <a href="/empleados" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button id="btnGuardar" type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



@section('js')

<!-- Para incluir jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Para incluir SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

<script>
    $(document).ready(function() {
        $('#btnGuardar').click(function() {
            $.ajax({
                type: "POST",
                url: "{{ route('empleados.store') }}",
                data: $('#formEmpleados').serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El empleado ha sido agregado con éxito',
                        icon: 'success',
                        timer: 5000,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                    $('#formEmpleados')[0].reset();
                    window.location.href = '/empleados';
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al agregar el empleado',
                        icon: 'error', // Puedes cambiar 'success' por 'warning', 'error' o 'info'
                        timer: 5000, // Duración de la alerta en milisegundos (3 segundos en este caso)
                        showCancelButton: false, // Si quieres mostrar o no un botón de cancelar
                        showConfirmButton: false // Si quieres mostrar o no un botón de confirmar
                    });
                }
            });
        });
    });
</script>




@stop