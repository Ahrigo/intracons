@extends('adminlte::page')

@section('title', 'Construtec')

@section('content_header')
@stop

@section('content')

    <div class="section-body">

        <div>
            <figure class="highcharts-figure">
                <div id="container1"></div>
            </figure>
            <figure class="highcharts-figure">
                <div id="container3"></div>
            </figure>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-xl-4">

                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h5>Usuarios</h5>
                                        @php
                                            use App\Models\User;
                                            $cant_usuarios = User::count();
                                        @endphp
                                        <h2 class="text-right"><i
                                                class="fa fa-users f-left"></i><span>{{ $cant_usuarios }}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-4">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h5>Roles</h5>
                                        @php
                                            use Spatie\Permission\Models\Role;
                                            $cant_roles = Role::count();
                                        @endphp
                                        <h2 class="text-right"><i
                                                class="fa fa-user-lock f-left"></i><span>{{ $cant_roles }}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-4">
                                <div class="card bg-c-pink order-card">
                                    <div class="card-block">
                                        <h5>Empleados</h5>
                                        @php
                                            use App\Models\Empleados;
                                            $cant_empleados = Empleados::count();
                                        @endphp
                                        <h2 class="text-right"><i
                                                class="fa fa-blog f-left"></i><span>{{ $cant_empleados }}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/blogs" class="text-white">Ver más</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-4">
                                <div class="card bg-c-blu order-card">
                                    <div class="card-block">
                                        <h5>Proyectos</h5>
                                        @php
                                            use App\Models\Proyectos;
                                            $cant_proyectos = Proyectos::count();
                                        @endphp
                                        <h2 class="text-right"><i
                                                class="fa fa-blog f-left"></i><span>{{ $cant_proyectos }}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/blogs" class="text-white">Ver más</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-4">
                                <div class="card bg-c-yell order-card">
                                    <div class="card-block">
                                        <h5>Incidencias</h5>
                                        @php
                                            use App\Models\Incidencias;
                                            $cant_incidencias = Incidencias::count();
                                        @endphp
                                        <h2 class="text-right"><i
                                                class="fa fa-blog f-left"></i><span>{{ $cant_incidencias }}</span></h2>
                                        <p class="m-b-0 text-right"><a href="/blogs" class="text-white">Ver más</a></p>
                                    </div>
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        /* NUEVO PARA ESTE PROYECTO */
        .order-card {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg, #73b4ff, #4099ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg, #59e0c5, #2ed8b6);
        }

        .bg-c-pink {
            background: linear-gradient(45deg, #ff869a, #FF5370);
        }

        .bg-c-blu {
            background: linear-gradient(45deg, #ff86e5, #5953ff);
        }

        .bg-c-yell {
            background: linear-gradient(45deg, #f1ff86, #d1ff53);
        }

        .card {
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 26px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }






        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 580px;
            max-width: 500px;
            display: inline-block;

        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        input[type="number"] {
            min-width: 50px;
        }
    </style>

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



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>





    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>


    <script>
        // Data retrieved from https://netmarketshare.com
        Highcharts.chart('container1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'INCIDENCIAS',
                align: 'center'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer'
                }
            },
            series: [{
                name: 'Incidencias',
                colorByPoint: true,
                data: [{
                    name: 'Abierto',
                    y: {{ $count_estado_1 }},
                    sliced: true,
                    selected: true
                }, {
                    name: 'Cerrado',
                    y: {{ $count_estado_2 }}
                }]
            }]
        });
    </script>




    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'center',
                text: 'PROYECTOS'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'CantProyectos'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                }
            },

            series: [{
                name: 'Proyectos',
                colorByPoint: true,
                data: [{
                        name: 'Daniel',
                        y: 4,
                        drilldown: 'Daniel'
                    },
                    {
                        name: 'Adonis',
                        y: 10,
                        drilldown: 'Adonis'
                    },
                    {
                        name: 'Marco',
                        y: 8,
                        drilldown: 'Marco'
                    },
                    {
                        name: 'Luis',
                        y: 20,
                        drilldown: 'Luis'
                    }
                ]
            }]
        });
    </script>



    <script type="text/javascript">
        var users = {{ Js::from($users) }};

        Highcharts.chart('container2', {
            title: {
                text: 'New User Growth, 2022'
            },
            subtitle: {
                text: 'Source: itsolutionstuff.com.com'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number of New Users'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'New Users',
                data: users
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>


    <script type="text/javascript">
        var proyectos = {{ Js::from($proyectos) }};
        var meses = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];

        // Crea un objeto con los datos por mes
        var data = {};
        for (var i = 0; i < meses.length; i++) {
            data[meses[i]] = 0;
        }
        for (var i = 0; i < proyectos.length; i++) {
            var mes = meses[i];
            data[mes] = proyectos[i];
        }

        // Crea un arreglo con los datos para el gráfico
        var datosGrafico = [];
        for (var i = 0; i < meses.length; i++) {
            var mes = meses[i];
            datosGrafico.push(data[mes]);
        }

        Highcharts.chart('container3', {
            title: {
                text: 'Proyectos'
            },
            xAxis: {
                categories: meses
            },
            yAxis: {
                title: {
                    text: 'Número de Proyectos'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'New Proyectos',
                data: datosGrafico
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>


@stop
