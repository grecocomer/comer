@extends('index')

@section("contenido")

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css" />
    <script src="main.js"></script>
</head>

<body>
    <H1 align="center">Reporte Proveedor</H1>
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
                                        <th>telefono</th>
                                        <th>calle</th>
                                        <th>no_int</th>
                                        <th>no_ext</th>
                                        <th>colonia</th>
                                        <th>localidad</th>
                                        <th>municipio</th>
                                        <th>genero</th>
                                        <th>codigo postal</th>
                                        <th>estado</th>
                                        
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($proveedores as $prov)
                                    <tr>
                                        <td>{{$prov->id_prov}}</td>
                                        <td>{{$prov->nombre_prov}}</td>
                                        <td>{{$prov->apa_prov}}</td>
                                        <td>{{$prov->ama_prov}}</td>
                                        <td> <img src="{{asset('Archivo/'. $prov->archivo)}}" height=50 windth=50></td>
                                        <td>{{$prov->correo_prov}}</td>
                                        <td>{{$prov->tel_prov}}</td>
                                        <td>{{$prov->calle_prov}}</td>
                                        <td>{{$prov->no_ext}}</td>
                                        <td>{{$prov->no_int}}</td>
                                        <td>{{$prov->col_prov}}</td>
                                        <td>{{$prov->loca_prov}}</td>
                                        <td>{{$prov->mun_prov}}</td>
                                        <td>{{$prov->genero}}</td>
                                        <td>{{$prov->cp}}</td>
                                        <td>{{$prov->s}}</td>
                                        <td>
                                            @if($prov->deleted_at=="")
                                            @if (Session::get('sesiontipo')=="Admin")

                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('conproveedor@modificap',['id_prov'=>$prov->id_prov])}}">
                                        <i class="fa fa-edit">
                                            Modificar
                                            </i>
                                        </a>
                                        </button>

                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('conproveedor@eliminap',['id_prov'=>$prov->id_prov])}}">
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
                                        <a href="{{URL::action('conproveedor@restaurarp',['id_prov'=>$prov->id_prov])}}">
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