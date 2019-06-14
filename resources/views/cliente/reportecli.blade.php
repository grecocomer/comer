@extends('index')

@section("contenido")


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<script src="main.js"></script>-->
</head>
<h1 align="center">Reporte Clientes</h1><br>
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
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido materno</th>
                                    <th>Apellido paterno</th>
                                    <th>Foto</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                 <!--   <th>Calle</th>
                                    <th>No_int</th>
                                    <th>No_ext</th>
                                    <th>Colonia</th>
                                    <th>Localidad</th>
                                    <th>Municipio</th>
                                    <th>Estado</th>-->
                                    <th>CP</th>
                                    <th>Estado</th>
                                    <th>Operaciones</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach($clientes as $cli)
                                <tr>
                                    <td>{{$cli->id}}</td>
                                    <td>{{$cli->nombrecli}}</td>
                                    <td>{{$cli->apacli}}</td>
                                    <td>{{$cli->amacli}}</td>
                                    <!--campo de la base-->
                                    <td> <img src="{{asset('Archivo/'. $cli->archivo)}}" height=50 windth=50></td>
                                    <td>{{$cli->correocli}}</td>
                                    <td>{{$cli->telcli}}</td>
                                    <td>{{$cli->cp}}</td>
                                    <td>{{$cli->esta}}</td>

                                    <td>
                                        @if($cli->deleted_at=="")
                                        @if (Session::get('sesiontipo')=="Admin")
                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('concliente@modificac',['id'=>$cli->id])}}">
                                        <i class="fa fa-edit">
                                            Modificar
                                            </i>
                                        </a>
                                        </button>
                                        
                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('concliente@eliminac',['id'=>$cli->id])}}">
                                        <i class="fa fa-trash">
                                            Elimina
                                            </i>
                                        </a>
                                        </button>
                                        @else
                                        @endif

                                        @else
                                        @if (Session::get('sesiontipo')=="Admin")
                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('concliente@restaurarc',['id'=>$cli->id])}}">
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
