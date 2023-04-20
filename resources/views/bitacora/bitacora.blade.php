@extends('adminlte::page')

@section('title', 'Construtec')

@section('content_header')
    <h1>Bitácora de Ingresos</h1>


@stop

@section('content')


<div class="container">
    
<table id="incidencias" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-dark text-white">

            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Correo</th>
                <!-- <th>Tipo evento</th> -->
                <th>Navegador</th>
                <th>Dispositivo</th>
                <th>Plataforma</th>
                <th>Fecha y Hora</th>
                <th>Dirección IP</th>
                
                
            </tr>
        </thead>
        <tbody>
    @foreach($eventos as $evento)
        <tr>
            <td>{{ $evento->id }}</td>
            <td>{{ $evento->usuario }}</td>
            <td>{{ $evento->correo }}</td>
            <!-- <td>{{ $evento->tipo_evento }}</td> -->
            <td>{{ $evento->navegador }}</td>
            <td>@if($esMovil)
    <p>Móvil</p>
@else
    <p>PC/Otro</p>
@endif</td>
            <td>{{ $evento->plataforma}}</td>
            
            <td>{{ $evento->created_at}}</td>
            <td>{{ $evento->direccion_ip }}</td>
        </tr>
    @endforeach
</tbody>
    </table>
</div>
    

@stop

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>


<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>


<script>
$(document).ready(function() {
    $.extend(true, $.fn.dataTable.defaults, {
        "oLanguage": {
            "sSearch": "Buscar Incidencias",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 registros",
            "sInfoFiltered": "(filtrados de _MAX_ registros totales)",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay datos disponibles en la tabla",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        }
    
});

    $('#incidencias').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copiar',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });
});
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás deshacer esta acción.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4BB543',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        });
    });
</script>


@stop
