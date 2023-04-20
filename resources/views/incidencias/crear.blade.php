@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar Incidencia</h1>
@stop

@section('content')


    <!-- Main content -->
    <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de Incidencias</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <form id="formIncidencias" action="/incidencias" method="POST">

  @csrf

  <div class="row">
  <div class="col-md-6 col-sm-12 mb-3">
    <label for="proyecto" class="form-label">Proyectos Completados</label>
    <select id="proyectoSelect" name="idProyecto" class="form-control @error('idProyecto') is-invalid @enderror" tabindex="5">
      <option value="">Seleccione un proyecto</option>
      @foreach($proyectos as $proyecto)
        <option value="{{ $proyecto->idProyecto }}" @if(old('idProyecto') == $proyecto->idProyecto) selected @endif>{{ $proyecto->nombreProyecto }}</option>
      @endforeach
    </select>
    @error('idProyecto')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-6 col-sm-12 mb-3">
    <label for="descripcion" class="form-label">Descripción Incidencia</label>
    <div class="w-100">
      <textarea id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="4" tabindex="2" style="font-size: 16px;">{{ old('descripcion') }}</textarea>
      @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="fechaReporte" class="form-label">Fecha de Reporte</label>
            <input type="date" id="fechaReporte" name="fechaReporte" type="number" class="form-control @error('fechaReporte') is-invalid @enderror" value="{{ old('fechaReporte') }}" tabindex="3">
            @error('fechaInicio')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="fechaCierreReporte" class="form-label">Fecha Cierre Reporte</label>
            <input type="date" id="fechaCierreReporte" name="fechaCierreReporte" type="number" class="form-control @error('fechaCierreReporte') is-invalid @enderror" value="{{ old('fechaCierreReporte') }}" tabindex="3">
            @error('fechaFinalizacion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="aprobacionincidencia" class="form-label">Aprobación</label>
            <select id="idAprobacionIncidencia" name="idAprobacionIncidencia" class="form-control @error('idAprobacionIncidencia') is-invalid @enderror" tabindex="5">
                <option value="">Seleccione una opción</option>
                @foreach($aprobacionincidencias as $aprobacionincidencia)
                    <option value="{{ $aprobacionincidencia->idAprobacionIncidencia }}" @if(old('idAprobacionIncidencia') == $aprobacionincidencia->idAprobacionIncidencia) selected @endif>{{ $aprobacionincidencia->nombre }}</option>
                @endforeach
            </select>
            @error('idAprobacionIncidencia')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="estadoincidencia" class="form-label">Estado de Incidencia</label>
            <select id="idEstadoIncidencia" name="idEstadoIncidencia" class="form-control @error('idEstadoIncidencia') is-invalid @enderror" tabindex="5">
                <option value="">Seleccione un estado</option>
                @foreach($estadoincidencias as $estadoincidencia)
                    <option value="{{ $estadoincidencia->idEstadoIncidencia }}" @if(old('idEstadoIncidencia') == $estadoincidencia->idEstadoIncidencia) selected @endif>{{ $estadoincidencia->nombreIncidencia }}</option>
                @endforeach
            </select>
            @error('idEstadoIncidencia')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="mb-3">
      <label for="supervisor" class="form-label">Supervisor Encargado</label>
      <select id="idSupervisor" name="idSupervisor" class="form-control @error('idSupervisor') is-invalid @enderror" tabindex="5">
        <option value="">Seleccione un supervisor</option>
        @foreach($supervisores as $supervisor)
          <option value="{{ $supervisor->idSupervisor }}" @if(old('idSupervisor') == $supervisor->idSupervisor) selected @endif>{{ $supervisor->nombre }}</option>
        @endforeach
      </select>
      @error('idSupervisor')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="col-md-6">
    <div class="mb-3">
      <label for="solucion" class="form-label">Solución Incidencia</label>
      <textarea id="solucion" name="solucion" class="form-control @error('solucion') is-invalid @enderror col-12" rows="4" tabindex="2" style="font-size: 16px;">{{ old('solucion') }}</textarea>
      @error('solucion')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
</div>


</div>
</div>
</div>
</div>

<div class="float-right">
  <a href="/incidencias" class="btn btn-secondary" tabindex="5">Cancelar</a>   
  <button id="btnGuardar" type="submit" class="btn btn-primary" tabindex="4" onclick="this.disabled=true; this.form.submit();">Guardar</button>
   </div>    
        </div>
        </div>
      
     
                                                                              <!-- este onclik no deja que el usuario presione varias veces guardar -->
  </form>


            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
        </div> <!-- /.col-md-6 -->
      </div> <!-- /.row -->
    </section> <!-- /.content -->
</div> <!-- /.card-body -->
</div> <!-- /.card -->


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
                url: "{{ route('incidencias.store') }}",
                data: $('#formIncidencias').serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'La incidencia ha sido agregada con éxito',
                        icon: 'success',
                        timer: 5000,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                    $('#formIncidencias')[0].reset();
                    
                    window.location.href = '/incidencias';
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al agregar la incidencia',
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