@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar Proyecto</h1>
    
@stop

@section('content')

    
    <!-- Main content -->
    <section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">General</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">


  <form id="formProyectos" action="/proyectos/{{$proyectos->idProyecto}}" method="POST">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label for="nombreProyecto" class="form-label">Nombre de Proyecto</label>
    <input id="nombreProyecto" name="nombreProyecto" type="text" class="form-control @error('nombreProyecto') is-invalid @enderror" value="{{$proyectos->nombreProyecto}}" tabindex="1">
    @error('nombreProyecto')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción del Proyecto</label>
    <div>
        <textarea id="descripcion" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror col-12" rows="4" tabindex="2" style="font-size: 16px;">{{$proyectos->descripcion}}</textarea>
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="fechaInicio" class="form-label">Fecha Inicio</label>
            <input type="date" id="fechaInicio" name="fechaInicio" type="number" class="form-control @error('fechaInicio') is-invalid @enderror" value="{{ date('Y-m-d', strtotime($proyectos->fechaInicio)) }}" tabindex="3">
            @error('fechaInicio')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="fechaFinalizacion" class="form-label">Fecha Finalización</label>
            <input type="date" id="fechaFinalizacion" name="fechaFinalizacion" type="number" class="form-control @error('fechaFinalizacion') is-invalid @enderror" value="{{ date('Y-m-d', strtotime($proyectos->fechaFinalizacion)) }}" tabindex="3">
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
            <select id="tipoproyecto" name="tipoproyecto" class="form-control @error('tipoproyecto') is-invalid @enderror" tabindex="5">
                <option value="">Seleccione un tipo</option>
                @foreach($tipoproyectos as $tipoproyecto)                 
                    <<option value="{{ $tipoproyecto->idTipoProyecto }}" {{$proyectos->idTipoProyecto == $tipoproyecto->idTipoProyecto ? 'selected' : ''}}>{{$tipoproyecto->nombre}}</option>
                @endforeach
            </select>
            @error('tipoproyecto')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="estadoproyecto" class="form-label">Estado de Proyecto</label>
            <select id="estadoproyecto" name="estadoproyecto" class="form-control @error('estadoproyecto') is-invalid @enderror" tabindex="5">
                <option value="">Seleccione un estado</option>
                @foreach($estadoproyectos as $estadoproyecto)               
                    <option value="{{ $estadoproyecto->idEstadoProyecto }}" {{$proyectos->idEstadoProyecto == $estadoproyecto->idEstadoProyecto ? 'selected' : ''}}>{{$estadoproyecto->nombre}}</option>
                @endforeach
            </select>
            @error('estadoproyecto')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="cliente" class="form-label">Cliente</label>
    <select id="cliente" name="cliente" class="form-control @error('cliente') is-invalid @enderror" tabindex="5">
        <option value="">Seleccione un cliente</option>
        @foreach($clientes as $cliente)               
            <option value="{{ $cliente->idCliente }}" {{$proyectos->idCliente == $cliente->idCliente ? 'selected' : ''}}>{{$cliente->nombre}}</option>
        @endforeach
    </select>
    @error('cliente')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="supervisor" class="form-label">Supervisor</label>
    <select id="supervisor" name="supervisor" class="form-control @error('supervisor') is-invalid @enderror" tabindex="5">
        <option value="">Seleccione un supervisor</option>
        @foreach($supervisores as $supervisor)              
            <option value="{{ $supervisor->idSupervisor }}" {{$proyectos->idSupervisor == $supervisor->idSupervisor ? 'selected' : ''}}>{{$supervisor->nombre}}</option>
        @endforeach
    </select>
    @error('supervisor')
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
    <input type="number" id="montoOferta" name="montoOferta" type="text" class="form-control @error('montoOferta') is-invalid @enderror" value="{{$proyectos->montoOferta}}" tabindex="6">
    </div>
    @error('duracionMeses')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
          

<div class="mb-3">
    <label for="duracionMeses" class="form-label">Duración estimada:</label>
    <input type="number" id="duracionMeses" name="duracionMeses" type="text" class="form-control @error('duracionMeses') is-invalid @enderror" value="{{$proyectos->duracionMeses}}" tabindex="6">
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
            url: "{{ route('proyectos.update', $proyectos->idProyecto) }}", //Es importante la ruta para el mensaje
            data: $('#formProyectos').serialize(),
            success: function(response) {
                Swal.fire({
                    title: 'Edición Exitosa',
                    text: 'El proyecto ha sido editado con éxito',
                    icon: 'success',
                    timer: 5000,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                $('#formProyectos')[0].reset();
                window.location.href = '/proyectos';
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Error',
                    text: 'Ha ocurrido un error al editar el proyecto',
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