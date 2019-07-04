@extends('index')

@section("contenido")

<head>
    <link rel="stylesheet" href="https://www.glyphicons.com/">

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporte Servicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<H1 align="center">Reporte Servicio</H1>
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Export</h4>
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Costo</th>
                                    <th>Fecha solicitud</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha fin</th>
                                    <th>Empresa</th>
                                    <th>Empleado</th>
                                    <th>Categoria</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($servicios as $se)
                                <tr>
                                    <td>{{$se->id_ser}}</td>
                                    <td>{{$se->nombre_ser}}</td>
                                    <td>{{$se->descripcion_ser}}</td>
                                    <td>{{$se->costo}}</td>
                                    <td>{{$se->fecha_solicitud_ser}}</td>
                                    <td>{{$se->fecha_inicio_ser}}</td>
                                    <td>{{$se->fecha_fin_ser}}</td>
                                    <td>{{$se->noe}}</td>
                                    <td>{{$se->noem}}</td>
                                    <td>{{$se->nocat}}</td>
                                    <td>
                                        <!--session sirve para mostrar y ocultar dependiendo del tipo de usuario-->
                                        @if($se->deleted_at=="")
                                        @if (Session::get('sesiontipo')=="Admin")

                                        <button type="button" class="btn btn-default btn-xs">
                                            <a href="{{URL::action('conservicio@eliminaservicio',['id_ser'=>$se->id_ser])}}">
                                                <i class="fa fa-trash">
                                                    Elimina
                                                </i>
                                            </a>

                                        </button>
                                       
                                        <button type="button" class="btn btn-default btn-xs">
                                            <a href="{{URL::action('conservicio@modificaservicios',['id_ser'=>$se->id_ser])}}">
                                                <i class="fa fa-edit">
                                                    Modificar
                                                </i>
                                            </a>
                                        </button>
                                        @else
                                        @endif
                           
                                        @else
                                        @if (Session::get('sesiontipo')=="Admin")
                                        <button type="button" class="btn btn-default btn-xs">
                                            <a href="{{URL::action('conservicio@restaurarservicio',['id_ser'=>$se->id_ser])}}">
                                                <i class="fa fa-upload">
                                                    Restaurar
                                                </i>
                                            </a>
                                        </button>
                                        @else
                                        @endif
                         
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @stop