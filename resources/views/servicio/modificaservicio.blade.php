@extends('index')

@section("contenido")

<head>
    <title> Modifica Servicio</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

</head>

<!--<body align='center'>-->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <!--ruta para guadar los datos siempre debe de ir -->
                        <form action="{{Route('guardaedicionser')}}" method='POST' enctype='multipart/form-data' align="center">
                            {{csrf_field()}}
                            <h1 align='center'> Modifica Servicio</h1>
                            <br>
                            <br>
                            <br>
                            @if($errors->first('id_ser'))
                            <i>{{$errors->first('id_ser')}}</i>
                            @endif

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="id">Id: <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="id" type='text' name='id_ser' value="{{$servicios->id_ser}}" readonly='readonly'>
                                </div>
                            </div>

                            @if($errors->first('nombre_ser'))
                            <i> {{ $errors->first('nombre_ser')}}<i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nombre_ser">Nombre: <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="id" type='text' name='nombre_ser' value="{{$servicios->nombre_ser}}">
                                        </div>
                                    </div>

                                    @if($errors->first('descrpcion_ser'))
                                    <i> {{ $errors->first('descrpcion_ser')}}<i>
                                            @endif

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="descripcion_ser">Descripción:<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input class="form-control" id="id" type='text' name='descripcion_ser'
                                                        value="{{$servicios->descripcion_ser}}" >
                                                </div>
                                            </div>

                                            @if($errors->first('fecha_solicitud_ser'))
                                            <i>{{$errors->first('fecha_solicitud_ser')}}</i>
                                            @endif

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="fecha_solicitud_ser">Fecha
                                                    de solicitud:<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input class="form-control" id="id" type='date' name='fecha_solicitud_ser'
                                                        value="{{$servicios->fecha_solicitud_ser}}">
                                                </div>
                                            </div>

                                            @if($errors->first('fecha_inicio_ser'))
                                            <i>{{$errors->first('fecha_inicio_ser')}}</i>
                                            @endif

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="fecha_inicio_ser">Fecha de
                                                    Inicio:<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input class="form-control" id="id" type='date' name='fecha_inicio_ser'
                                                        value="{{$servicios->fecha_inicio_ser}}">
                                                </div>
                                            </div>

                                            @if($errors->first('fecha_fin_ser'))
                                            <i>{{$errors->first('fecha_fin_ser')}}</i>
                                            @endif

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="fecha_fin_ser">Fecha Fin:<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input class="form-control" id="id" type='date' name='fecha_fin_ser'
                                                        value="{{$servicios->fecha_fin_ser}}" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Seleccione la empresa">Seleccione
                                                    la empresa:<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="Seleccione la empresa" name='id_empresa'>
                                                    <option value='{{$id_empresa}}'>{{$empre}}</option>
                                                        @foreach($empresas as $em)
                                                        <option value='{{$em->id_empresa}}'>{{$em->nombre_empresa}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for=" Seleccione el empleado">
                                                    Seleccione el empleado:<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="Seleccione el empleado" name='id_emp'>
                                                    <option value='{{$id_emp}}'>{{$emp}}</option>
                                                        @foreach($empleados as $emp)
                                                        <option value='{{$emp->id_emp}}'>{{$emp->nombre_emp}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Seleccione la categoria">Seleccione
                                                    la categoria:<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="Seleccione la categoria" name='id_cat_ser'>
                                                    <option value='{{$id_cat_ser}}'>{{$catservicios}}</option>
                                                        @foreach($catservicios as $cate)
                                                        <option value='{{$cate->id_cat_ser}}'>{{$cate->nom_cate}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" name='Guardar' class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                            <!--<a href="" class="btn btn-success">Modificar</a>-->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@stop
