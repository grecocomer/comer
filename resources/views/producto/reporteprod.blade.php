@extends('index')

@section("contenido")

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporte</title>

</head>

<body>
    <H1 align="center">Reporte Productos</H1>
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
                                        <th>Foto</th>
                                        <th>Descripcion</th>
                                        <th>Costo</th>
                                        <th>Existencia</th>
                                        <th>Tipo</th> 
                                        <th>Unidad de Medida</th>
                                        <th>contenido</th>
                                        <th>Marca</th>
                                        <th>Categoria</th>
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>

                                </tbody>
                                @foreach($productos as $prod)
                                <tr>
                                    <td>{{$prod->id_prod}}</td>
                                    <td>{{$prod->nombre_prod}}</td>
                                    <td> <img src="{{asset('Archivo/'. $prod->archivo)}}" height=50 windth=50></td>
                                    <td>{{$prod->descripcion_prod}}</td>
                                    <td>{{$prod->costo}}</td>
                                    <td>{{$prod->Existencia}}</td>
                                    <td>{{$prod->tipo}}</td>  
                                    <td>{{$prod->u_m}}</td>
                                    <td>{{$prod->contenido}}</td>
                                    <td>{{$prod->nomarc}}</td>
                                    <td>{{$prod->nomcat}}</td>
                                    <td>
                                        @if($prod->deleted_at=="")
                                        @if (Session::get('sesiontipo')=="Admin")
                                        <button type="button" class="btn btn-default btn-xs">
                                            <a href="{{URL::action('conproducto@eliminaproducto',['id_prod'=>$prod->id_prod])}}">
                                                <i class="fa fa-trash">
                                                    Elimina
                                                </i>
                                            </a>
                                        </button>

                                        <button type="button" class="btn btn-default btn-xs">
                                            <a href="{{URL::action('conproducto@modificaproductos',['id_prod'=>$prod->id_prod])}}">
                                                <i class="fa fa-trash">
                                                    Modificar
                                                </i>
                                            </a>
                                        </button>
                                        @else
                                        @endif

                                        @else
                                        @if (Session::get('sesiontipo')=="Admin")
                                        <button type="button" class="btn btn-default btn-xs">
                                            <a href="{{URL::action('conproducto@restaurarproducto',['id_prod'=>$prod->id_prod])}}">
                                                <i class="fa fa-trash">
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