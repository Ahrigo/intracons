@extends('adminlte::page')

@section('title', 'Construtec')

@section('content_header')
    <h1>Detalles del proyecto</h1>
    
    
@stop


@section('content')

<a class="btn btn-sm btn-success" href="{{ route('proyectos.index') }}" title="Volver">
                <i class="fas fa-arrow-left">
                </i>
                Volver
            </a>
            
            <button type="button" class="btn btn-sm btn-primary" id="btnImprimir" title="Imprimir">
    <i class="fas fa-print"></i>
    Imprimir
</button>

<button type="button" class="btn btn-sm btn-danger" id="btnDescargarPDF" title="Descargar">
    <i class="fas fa-download"></i>
    Descargar PDF
</button>
            <p></p>


<div id="contenido">
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="card-title"></div>
            
            <p class="card-category"><strong>Vista detallada del proyecto {{ $proyectos->nombreProyecto }} </strong></p>

            </div>
          
              <!--Start third-->
              <div class="col-md-6>
                <div class="card card-user">
                  <div class="card-body">
                  
                    <table id="detalleProyecto" class="table table-striped table-bordered shadow-lg mt-4">
                      <tbody>
                        <tr>
                          <th>ID</th>
                          <td>{{ $proyectos->idProyecto }}
                          </td>
                        </tr>
                        <tr>
                          <th>Nombre</th>
                          <td>{{ $proyectos->nombreProyecto }}</td>
                        </tr>
                        <tr>
                          <th>Descripción</th>
                          <td>{{ $proyectos->descripcion }}</td>
                        </tr>

                        <tr>
                          <th>Estado de Proyecto</th>
                          <td>{{ $proyectos->estadoNombre() }}</td>
                        </tr>

                        <tr>
                          <th>Tipo de Proyecto</th>
                          <td>{{ $proyectos->tipoNombre() }}</td>
                        </tr>
                        
                        <tr>
                          <th>Cliente</th>
                          <td>{{ $proyectos->clienteNombre() }}</td>
                        </tr>

                        <tr>
                          <th>Supervisor Encargado</th>
                          <td>{{ $proyectos->supervisorNombre() }}</td>
                        </tr>

                        <tr>
                          <th>Fecha de Inicio</th>
                          <td>{{ date('d/m/Y', strtotime($proyectos->fechaInicio))}}</td>
                        </tr>               

                        <tr>
                          <th>Fecha de Finalizacion</th>
                          <td>{{ date('d/m/Y', strtotime($proyectos->fechaFinalizacion)) }}</td>

                        </tr>

                        <tr>
                          <th>Presupuesto estimado</th>
                          <td>${{ $proyectos->montoOferta }}</td>
                        </tr>
                        <tr>

                          <th>Duración estimada</th>
                          <td>{{ $proyectos->duracionMeses}}</td>
                        </tr>
                        <tr>
  <th>Documentos</th>
  <td>
  @if ($proyectos->documentos)
  <?php
    $nombreArchivo = basename($proyectos->documentos);
    $extensionArchivo = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
    switch ($extensionArchivo) {
      case 'pdf':
        $iconoArchivo = 'far fa-file-pdf';
        break;
      case 'doc':
      case 'docx':
        $iconoArchivo = 'far fa-file-word';
        break;
      default:
        $iconoArchivo = 'far fa-file';
        break;
    }
    $documentos = str_replace("\0", "", storage_path($proyectos->documentos));
    $tamanoArchivo = null; // inicializar variable
    if (file_exists($documentos)) {
      $tamanoArchivo = round(filesize($documentos) / 1024) . ' KB';
    }
  ?>
  <a href="{{ asset('storage/'.$proyectos->documentos) }}" class="" download>
    <i class="{{ $iconoArchivo }}"></i> {{ $nombreArchivo }} ({{ $tamanoArchivo }})
  </a>
@else
  No se ha agregado ningún documento
@endif

  </td>
</tr>



                      </tbody>
                    </table>
                  </div>
                  
                </div>
              </div>
              <!--end third-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"/>

@stop

@section('js')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        // Agregar evento click al botón de imprimir
        $("#btnImprimir").on("click", function () {
            window.print(); // Imprimir la página
        });
    });
</script>

<script>
$(document).ready(function() {
  // Agregar evento click al botón de Descargar PDF
  $("#btnDescargarPDF").on("click", function() {
    // Seleccionar el elemento que deseas convertir en PDF
    const element = document.getElementById("contenido");
    // Opciones de configuración para el PDF
    const options = {
      margin: [0, 0, 0, 0],
      filename: '{{ $proyectos->nombreProyecto }}.pdf', // Aquí se utiliza la variable $proyecto para definir el nombre del archivo PDF
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };
    // Crear el PDF
    html2pdf().set(options).from(element).save();
  });
});
</script>



@stop


