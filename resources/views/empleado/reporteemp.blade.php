@extends('index')

@section("contenido")

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporte</title>
</head>
<h1 align="center">Reporte Empleado</h1><br>
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
                                    <th>Apellido materno</th>
                                    <th>Apellido paterno</th>
                                    <th>RFC</th>
                                    <th>Foto</th>
                                    <th>Correo</th>
                                    <th>telefono</th>
                                    <th>calle</th>
                                    <th>no_int</th>
                                    <th>no_ext</th>
                                    <th>colonia</th>
                                    <th>localidad</th>
                                    <th>municipio</th>
                                    <th>codigo postal</th>
                                    <th>estado</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>

                            </tbody>

                            @foreach($empleados as $em)
                            <tr>
                                <td>{{$em->id_emp}}</td>
                                <td>{{$em->nombre_emp}}</td>
                                <td>{{$em->apa_emp}}</td>
                                <td>{{$em->ama_emp}}</td>
                                <td>{{$em->rfc}}</td>
                                <td> <img src="{{asset('Archivo/'. $em->archivo)}}" height=50 windth=50></td>
                                <td>{{$em->correo}}</td>
                                <td>{{$em->telemp}}</td>
                                <td>{{$em->calle_emp}}</td>
                                <td>{{$em->no_ext}}</td>
                                <td>{{$em->no_int}}</td>
                                <td>{{$em->colemp}}</td>
                                <td>{{$em->locaemp}}</td>
                                <td>{{$em->munemp}}</td>
                                <td>{{$em->cp}}</td>
                                <td>{{$em->gene}}</td>
                                    <!--aqui me quede sigue la eliminacion-->
                                    <td>
                                        @if($em->deleted_at=="")
                                        @if (Session::get('sesiontipo')=="Admin")
                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('conempleado@modificae',['id_emp'=>$em->id_emp])}}">
                                        <i class="fa fa-edit">
                                            Modificar
                                            </i>
                                        </a>
                                        </button>

                                        <button type="button" class="btn btn-default btn-xs">
                                        <a href="{{URL::action('conempleado@eliminae',['id_emp'=>$em->id_emp])}}">
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
                                        <a href="{{URL::action('conempleado@restaurare',['id_emp'=>$em->id_emp])}}">
                                        <i class="fa fa-uplload">
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