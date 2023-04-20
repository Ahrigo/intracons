@extends('adminlte::page')

@section('title', 'Construtec')

@section('content_header')
    <h1>Mantenimiento de Proyectos</h1>


@stop

@section('content')

    @can('crear-proyectos')
        <a class="btn btn-danger btn-sm" href="proyectos/create" title="Agregar">
            <i class="fas fa-pencil-alt">
            </i>
            Agregar
        </a>
    @endcan

    <p></p>

    <table id="empleados" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-dark text-white">

            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre Proyecto</th>
                <th scope="col">Cliente</th>
                <th scope="col">Estado</th>
                <th scope="col">Monto Oferta</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($proyectos as $proyectos)
                <tr>

                    <td>{{ $proyectos->idProyecto }}</td>
                    <td>{{ $proyectos->nombreProyecto }}</td>
                    <td>{{ $proyectos->clienteNombre() }}</td>


                    

                    <td style="text-align:center;">
                        <label class="badge {{ $proyectos->estadoNombre() == 'Completado' ? 'bg-success' : ($proyectos->estadoNombre() == 'En Proceso' ? 'bg-warning' : 'bg-danger') }}"
                            style="display: inline-block; border-radius: 50px; padding: 10px 14px;">
                            {{ $proyectos->estadoNombre()}}
                        </label>
                    </td>

                    <td>${{ number_format($proyectos->montoOferta) }}</td>





                    <td style="text-align:center;">
                        <div class="d-flex justify-content-center">


                            <a href="/proyectos/{{ $proyectos->idProyecto }}" class="btn btn-primary mr-2" title="Editar">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>

                            <form action="{{ route('proyectos.destroy', $proyectos->idProyecto) }}" method="POST">

                                @can('editar-proyectos')
                                <a href="/proyectos/{{ $proyectos->idProyecto }}/edit" class="btn btn-info mr-2"
                                    title="Editar">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                @endcan
                                @csrf
                                @can('borrar-proyectos')
                                @method('DELETE')
                                <button class="btn btn-danger" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                                @endcan
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>



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
                    "sSearch": "Buscar Proyectos",
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

            $('#empleados').DataTable({
                dom: 'Bfrtip',
                buttons: [{
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

    <script></script>


@stop
