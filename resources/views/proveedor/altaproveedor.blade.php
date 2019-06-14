@extends('index')

@section("contenido")

<head>
    <title> Alta Cliente</title>
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
                        <form action="{{Route('guardaproveedor')}}" method='POST' enctype='multipart/form-data' align="center">
                            {{csrf_field()}}
                            <h1 align='center'> Alta Poveedor</h1>
                            <br>
                            <br>
                            @if($errors->first('id_prov'))
                            <i>{{$errors->first('id_prov')}}</i>
                            @endif

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="id_prov">Id: <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input class="form-control" id="id" type='text' name='id_prov' value="{{$idv}}"
                                        readonly='readonly'>
                                </div>
                            </div>

                            @if($errors->first('nombre_prov'))
                            <i> {{ $errors->first('nombre_prov') }}<i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Nombre">Nombre: <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input placeholder="Nombre..." class="form-control" id="Nombre" type='text' name='nombre_prov'
                                                value="{{old('nombre_prov')}}" />
                                        </div>
                                    </div>

                                    @if($errors->first('apa_prov'))
                                    <i>{{$errors->first('apa_prov')}}</i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Apellido Paterno"> Apellido
                                            Paterno: <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input placeholder="Apellido Paterno..." class="form-control" id="Apellido Paterno" type='text' name='apa_prov'
                                                value="{{old('apa_prov')}}" />
                                        </div>
                                    </div>

                                    @if($errors->first('ama_prov'))
                                    <i>{{$errors->first('ama_prov')}}</i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Apellido Materno"> Apellido
                                            Materno: <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input placeholder="Apellido Materno..." class="form-control" id="Apellido Materno" type='text' name='ama_prov'
                                                value="{{old('ama_prov')}}" />
                                        </div>
                                    </div>

                                    @if($errors->first('Archivo'))
                                    <i>{{ $errors->first('Archivo')}}</i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Archivo"> Archivo:<span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="Archivo" type="file" name="Archivo" align="center">
                                        </div>
                                    </div>

                                    @if($errors->first('correo_prov'))
                                    <i> {{ $errors->first('correo_prov') }}<i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Correo">Correo: <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Correo..." class="form-control" id="Correo" type='text' name='correo_prov'
                                                        value="{{old('correo_prov')}}">
                                                </div>
                                            </div>

                                            @if($errors->first('tel_prov'))
                                            <i>{{$errors->first('tel_prov')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Telefono"> Telefono: <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Telefono..." class="form-control" id="Telefono" type='text' name='tel_prov'
                                                        value="{{old('tel_prov')}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for=" Telefono"> Genero:<span
                                                        class="text-danger">*</span></label>
                                                        
                                                        <input type='radio' name='genero' value='masculino' checked>Masculino
                                                        <input type='radio' name='genero' value='femenino'>Femenino
                                                        <br>
                                                        
                                                        </div>
                                            </div>

                                            @if($errors->first('calle_prov'))
                                            <i>{{$errors->first('calle_prov')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Calle"> Calle: <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Calle..." class="form-control" id="Calle" type='text' name='calle_prov'
                                                        value="{{old('calle_prov')}}">
                                                </div>
                                            </div>

                                            @if($errors->first('no_ext'))
                                            <i>{{$errors->first('no_ext')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Numero Exterior"> Numero
                                                    Exterior: <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Numero..." class="form-control" id="Numero Exterior" type='text' name='no_ext'
                                                        value="{{old('no_ext')}}">
                                                </div>
                                            </div>

                                            @if($errors->first('no_int'))
                                            <i>{{$errors->first('no_int')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Numero Interior"> Numero
                                                    Interior:<span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Numero..." class="form-control" id="Numero Interior" type='text' name='no_int'
                                                        value="{{old('no_int')}}">
                                                </div>
                                            </div>

                                            @if($errors->first('col_prov'))
                                            <i>{{$errors->first('col_prov')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Colonia"> Colonia:<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Colonia..." class="form-control" id="Colonia" type='text' name='col_prov'
                                                        value="{{old('col_prov')}}">
                                                </div>
                                            </div>

                                            @if($errors->first('loca_prov'))
                                            <i>{{$errors->first('loca_prov')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Localidad"> Localidad:<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Localidad..." class="form-control" id="Localidad" type='text' name='loca_prov'
                                                        value="{{old('loca_prov')}}">
                                                </div>
                                            </div>

                                            @if($errors->first('mun_prov'))
                                            <i>{{$errors->first('mun_prov')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Municipio">Municipio:<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Municipio..." class="form-control" id="Municipio" type='text' name='mun_prov'
                                                        value="{{old('mun_prov')}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="Seleccione estado">Seleccione
                                                            su Estado: <span class="text-danger">*</span></label>
                                                        <div class="col-lg-6">
                                                        <select class="form-control" id="Seleccione su Sexo" name="id_es">
                                                    <!--solo se optiene los datos de la tablas-->
                                                                @foreach($estados as $se)
                                                                <option value='{{$se->id_es}}'>{{$se->estado}}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                            </div>

                                            @if($errors->first('cp'))
                                            <i> {{ $errors->first('cp') }}<i>
                                                    @endif
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="Codigo Postal">Codigo
                                                            Postal:<span class="text-danger">*</span></label>
                                                        <div class="col-lg-6">
                                                            <input placeholder="CP..."  class="form-control" id="Codigo Postal" type='text'
                                                                name='cp' value="{{old('cp')}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-lg-8 ml-auto">
                                                            <button type="submit" name='Guardar' class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </div>

                                                    <!--<a href="{{ url('/reporteclientes/') }}" class="btn btn-success">Modificar</a>-->

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@stop
