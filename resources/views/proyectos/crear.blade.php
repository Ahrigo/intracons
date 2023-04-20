@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar Proyecto</h1>
@stop

@section('content')


    <!-- Main content -->
    <section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Formulario de Proyectos</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <form id="formProyectos" action="/proyectos" method="POST">

  @csrf
  <div class="mb-3">
    <label for="nombreProyecto" class="form-label">Nombre de Proyecto</label>
    <input id="nombreProyecto" name="nombreProyecto" type="text" class="form-control @error('nombreProyecto') is-invalid @enderror" value="{{ old('nombreProyecto') }}" tabindex="1">
    @error('nombreProyecto')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción del Proyecto</label>
    <div>
        <textarea id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror col-12" rows="4" tabindex="2" style="font-size: 16px;">{{ old('descripcion') }}</textarea>
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="fechaInicio" class="form-label">Fecha Inicio</label>
            <input type="date" id="fechaInicio" name="fechaInicio" type="number" class="form-control @error('fechaInicio') is-invalid @enderror" value="{{ old('fechaInicio') }}" tabindex="3">
            @error('fechaInicio')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="fechaFinalizacion" class="form-label">Fecha Finalización</label>
            <input type="date" id="fechaFinalizacion" name="fechaFinalizacion" type="number" class="form-control @error('fechaFinalizacion') is-invalid @enderror" value="{{ old('fechaFinalizacion') }}" tabindex="3">
            @error('fechaFinalizacion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="tipoproyecto" class="form-label">Tipo de Proyecto</label>
            <select id="idTipoProyecto" name="idTipoProyecto" class="form-control @error('idTipoProyecto') is-invalid @enderror" tabindex="5">
                <option value="">Seleccione un tipo</option>
                @foreach($tipoproyectos as $tipoproyecto)
                    <<option value="{{ $tipoproyecto->idTipoProyecto }}" @if(old('idTipoProyecto') == $tipoproyecto->idTipoProyecto) selected @endif>{{ $tipoproyecto->nombre }}</option>
                @endforeach
            </select>
            @error('idTipoProyecto')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="estadoproyecto" class="form-label">Estado de Proyecto</label>
            <select id="idEstadoProyecto" name="idEstadoProyecto" class="form-control @error('idEstadoProyecto') is-invalid @enderror" tabindex="5">
                <option value="">Seleccione un estado</option>
                @foreach($estadoproyectos as $estadoproyecto)
                    <option value="{{ $estadoproyecto->idEstadoProyecto }}" @if(old('idEstadoProyecto') == $estadoproyecto->idEstadoProyecto) selected @endif>{{ $estadoproyecto->nombre }}</option>
                @endforeach
            </select>
            @error('idEstadoProyecto')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="cliente" class="form-label">Cliente</label>
    <select id="idCliente" name="idCliente" class="form-control @error('idCliente') is-invalid @enderror" tabindex="5">
        <option value="">Seleccione un cliente</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->idCliente }}" @if(old('idCliente') == $cliente->idCliente) selected @endif>{{ $cliente->nombre }}</option>
        @endforeach
    </select>
    @error('idCliente')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="supervisor" class="form-label">Supervisor</label>
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
</div>
</div>

<div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Presupuesto</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

         <div class="mb-3">
  <label for="montoOferta" class="form-label">Presupuesto estimado:</label>
  <div class="input-group">
    <span class="input-group-text">$</span>
    <input type="number" id="montoOferta" name="montoOferta" type="text" class="form-control @error('montoOferta') is-invalid @enderror" value="{{ old('montoOferta') }}" tabindex="6">
  </div>
  @error('duracionMeses')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>


<div class="mb-3">
    <label for="duracionMeses" class="form-label">Duración estimada:</label>
    <input type="number" id="duracionMeses" name="duracionMeses" type="text" class="form-control @error('duracionMeses') is-invalid @enderror" value="{{ old('duracionMeses') }}" tabindex="6">
    @error('duracionMeses')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
          </div>
        </div>
        
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Documentación adjunta</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <div class="mb-3">
    <label for="documentos" class="form-label"></label>
    <div class="input-group">
        <input type="text" class="form-control" readonly>
        <label class="input-group-btn">
            <span class="btn btn-primary">
                Seleccionar archivo <input type="file" id="documentos" name="documentos" style="display: none;" accept=".doc,.docx,.pdf">
            </span>
        </label>
    </div>
    @error('documentos')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

</div> 
</div>     
<div class="float-right">
  <a href="/proyectos" class="btn btn-secondary" tabindex="5">Cancelar</a>   
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
                url: "{{ route('proyectos.store') }}",
                data: $('#formProyectos').serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Registro Exitoso',
                        text: 'El proyecto ha sido agregado con éxito',
                        icon: 'success',
                        timer: 5000,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                    $('#formProyectos')[0].reset();
                    window.location.href = '/proyectos';
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al agregar el proyecto',
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