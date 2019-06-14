@extends('index')

@section("contenido")

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporte Servicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<H1 align="center">Reporte empresa</H1>
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="fi">Filtrado de datos:
                                                <div class="col-lg-6">
                                                    <input placeholder="Filtro..." class="form-control" id="fi" type='text' >
                                                </div>
                                            </div>
                                <tr>
                                    <th>CLAVE</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                  <!--  <th>Activo</th>-->
                                    <th>Operaciones</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach($empresas as $se)
                                <tr>
                                    <td>{{$se->id_empresa}}</td>
                                    <td>{{$se->nombre_empresa}}</td>
                                    <td>{{$se->tipo_empresa}}</td>
                                   
                                    <td>
                                        @if($se->deleted_at=="")
                                        @if (Session::get('sesiontipo')=="Admin")
                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('conempresa@modificaem',['id_empresa'=>$se->id_empresa])}}">
                                        <i  class="fa fa-edit">
                                            Modificar
                                            </i>
                                        </a>
                                        </button>

                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('conempresa@eliminaem',['id_empresa'=>$se->id_empresa])}}">
                                        <i  class="fa fa-trash">
                                            Elimina
                                            </i>
                                        </a>
                                        </button>
                                        @else
                                        @endif

                                        @else
                                        @if (Session::get('sesiontipo')=="Admin")
                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('conempresa@restaurarem',['id_empresa'=>$se->id_empresa])}}">
                                        <i  class="fa fa-upload">
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