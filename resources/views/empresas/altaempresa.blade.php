@extends('index')

@section("contenido")

<head>
    <title> Alta Empresa</title>
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
                        <form action="{{Route('guardaempresa')}}" method='POST' enctype='multipart/form-data' align="center">
                            {{csrf_field()}}
                            <h1 align='center'> Alta Empresa</h1>
                            <br>
                            <br>
                            <br>
                            @if($errors->first('id_empresa'))
                            <i>{{$errors->first('id_empresa')}}</i>
                            @endif
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="id_empresa">Id: <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input  class="form-control" id="id" type='text' name='id_empresa' value="{{$id_empresas}}">
                                </div>
                            </div>

                            @if($errors->first('nombre_empresa'))
                            <i> {{ $errors->first('nombre_empresa') }}<i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Nombre">Nombre Empresa: <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input placeholder="Nombre..." class="form-control" id="Nombre" type='text' name='nombre_empresa'
                                                value="{{old('nombre_empresa')}}" />
                                        </div>
                                    </div>

                   
                                    @if($errors->first('tipo_empresa'))
                                    <i> {{ $errors->first('tipo_empresa') }}<i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Descripción">Tipo empresa:
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Tipo..." class="form-control" id="Descripción" type='text' name='tipo_empresa'
                                                        value="{{old('tipo_empresa')}}">
                                                </div>
                                            </div>
                                            </div>


                                        <!--    @if($errors->first('activo'))
                                            <i>{{$errors->first('activo')}}</i>
                                            @endif
                                                        <div class="form-group row">    
                                                        <label class="col-lg-4 col-form-label" for="activo">Tipo:
                                                        <span class="text-danger">*</span></label>
                                                        <label class="col-lg-4 col-form-label" for="activo">
                                                        <input type="radio" name="activo" value="si" checked>Si
                                                        <input type="radio" name="activo" value="no" >No
                                                        </label>
                                                   
                                                    </div>-->
                                                    

                                           




                                            <!--<a href="" class="btn btn-success">Modificar</a>-->
                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" name='Guardar' class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
@stop
