@extends('index')

@section("contenido")

<head>
    <title>modificar Producto</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
<!--<body align='center'>-->

                        <!--ruta para guadar los datos siempre debe de ir -->
                        <form action="{{Route('guardaedicionp')}}" method='POST' enctype='multipart/form-data' align="center">
                            {{csrf_field()}}
                            <h1 align='center'> Modificar Producto</h1>
                            <br>
                            <br>
                            <br>
                            @if($errors->first('id_prod'))
                            <i>{{$errors->first('id_prod')}}</i>
                            @endif
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="id">Id: <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="id" type='text' name='id_prod' value="{{$productos->id_prod}}"
                                        readonly='readonly'>
                                </div>
                            </div>

                            @if($errors->first('nombre_prod'))
                            <i> {{ $errors->first('nombre_prod') }}<i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Nombre">Nombre: <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="Nombre" type='text' name='nombre_prod'
                                                value="{{$productos->nombre_prod}}" />
                                        </div>
                                    </div>

                                    @if($errors->first('Archivo'))
                                    <i>{{ $errors->first('Archivo')}}</i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Archivo">Archivo: <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                        <img src="{{asset('Archivo/'. $productos->archivo)}}" height=150 windth=150>
                                            <input class="form-control" id="Archivo" type="file" name="Archivo" align="center">
                                        </div>
                                    </div>

                                    @if($errors->first('descrpcion_prod'))
                                    <i> {{ $errors->first('descrpcion_prod') }}<i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Descripción">Descripción:
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input class="form-control" id="Descripción" type='text' name='descripcion_prod'
                                                        value="{{$productos->descrpcion_prod}}">
                                                </div>
                                            </div>

                                            @if($errors->first('Existencia'))
                                            <i>{{$errors->first('Existencia')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Existencia">Existencia:
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                        <select class="form-control" id="Existencia" name='Existencia'
                                                        value="{{$productos->Existencia}}">                                                           
                                                            <option>Ninguna</option>
                                                            <option>1 Caja</option>
                                                            <option>2 Cajas</option>
                                                            <option>3 Cajas</option>
                                                            <option>4 Cajas</option>
                                                            <option>5 Cajas</option>
                                                            <option>1 Pza</option>
                                                            <option>2 Pza</option>
                                                            <option>3 Pza</option>
                                                            <option>4 Pza</option>
                                                            <option>5 Pza</option>
                                                            </select>
                                                </div>
                                            </div>

                                            @if($errors->first('costo'))
                                            <i>{{$errors->first('costo')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Costo">Costo: <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input class="form-control" id="Costo" type='text' name='costo'
                                                        value="{{$productos->costo}}">
                                                </div>
                                            </div>

                                            @if($errors->first('u_m'))
                                            <i>{{$errors->first('u_m')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for=" Unidad de medida"> Unidad
                                                    de medida: <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                        <select class="form-control" id=" Unidad de medida" name='u_m' value="{{$productos->u_m}}">                                                           
                                                            <option>1/2 pulgada</option>
                                                            <option>1/4 pulgada</option>
                                                            <option>1 pulgada</option>
                                                            <option>2 pulgada</option>
                                                            <option>3 pulgada</option>
                                                            <option>4 pulgada</option>
                                                            <option>5 pulgada</option>
                                                            <option>6 pulgada</option>
                                                            <option>7 pulgada</option>
                                                            <option>8 pulgada</option>
                                                            <option>9 pulgada</option>
                                                            <option>2/4 pulgada</option>
                                                            <option>3/4 pulgada</option>
                                                            <option>No aplica</option>
                                                            </select>
                                                </div>
                                            </div>

                                            @if($errors->first('contenido'))
                                            <i>{{$errors->first('contenido')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Contenido">Contenido:<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input class="form-control" id="Contenido" type='text' name='contenido'
                                                        value="{{$productos->contenido}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Seleccione su Marca">Seleccion
                                                    su Marca:<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="Seleccione su Marca" name='id_marca'>
                                                        @foreach($marcaproductos as $mar)
                                                        <option value='{{$mar->id_marca}}'>{{$mar->nom_marca}}</option>
                                                        @endforeach
                                                        <!--aqui esta el error-->
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Seleccione la categoria">Seleccione
                                                    la categoria:<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <select class="form-control" id="Seleccione la categoria" name='id_cat_producto'>
                                                        @foreach($catproductos as $cat)
                                                        <option value='{{$cat->id_cat_producto}}'>{{$cat->nom_categoria}}</option>
                                                        @endforeach
                                                        <!--aqui esta el error-->
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" name='Guardar' class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                        </form>
                       
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
