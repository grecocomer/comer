@extends('index')

@section('contenido')

<head>


 <head>

 <title> Alta Cliente</title>
   <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <script src="main.js"></script>
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
                        <form class="form-valide" action="{{Route('guardacliente')}}" method='POST' enctype='multipart/form-data'
                            align="center">
                            {{csrf_field()}}
                            <h1 align='center'> Alta Cliente</h1>
                            <br>
                            <br>
                            <br>
                            @if($errors->first('id'))
                            <i>{{$errors->first('id')}}</i>
                            @endif

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="id">Id: <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input placeholder="Nombre..." class="form-control" id="id" type='text' name='id' value="{{$idc}}" readonly='readonly'>
                                </div>
                            </div>


                            @if($errors->first('nombrecli'))
                            <i> {{ $errors->first('nombrecli') }}<i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Nombre">Nombre: <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input placeholder="Nombre..." class="form-control" id="Nombre" type='text' name='nombrecli' value="{{old('nombrecli')}}" />
                                        </div>
                                    </div>

                                    @if($errors->first('apacli'))
                                    <i>{{$errors->first('apacli')}}</i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Apellido Paterno">Apellido Paterno:
                                            <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input placeholder="Apellido Paterno..." class="form-control" id="Apellido Paterno" type='text' name='apacli'
                                                value="{{old('apacli')}}" />
                                        </div>
                                    </div>

                                    @if($errors->first('amacli'))
                                    <i>{{$errors->first('amacli')}}</i>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="Apellido Materno">Apellido Materno:
                                            <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input placeholder="Apellido Materno..." class="form-control" id="Apellido Materno" type='text' name='amacli'
                                                value="{{old('amacli')}}" />
                                        </div>
                                    </div>


                                    @if($errors->first('Archivo'))
                                    <i>{{ $errors->first('Archivo')}}</i>
                                    @endif<br>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for=" Archivo"> Archivo: <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="Archivo" type="file" name="Archivo" align="center">
                                        </div>
                                    </div>

                                    @if($errors->first('correocli'))
                                    <i> {{ $errors->first('correocli') }}<i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for=" Correo"> Correo: <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Correo..." class="form-control" id="Correo" type='text' name='correocli'
                                                        value="{{old('correocli')}}">
                                                </div>
                                            </div>


                                            @if($errors->first('telcli'))
                                            <i>{{$errors->first('telcli')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for=" Telefono"> Telefono:<span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Telefono..." class="form-control" id="Telefono" type='text' name='telcli'
                                                        value="{{old('telcli')}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for=" Telefono"> Telefono:<span
                                                        class="text-danger">*</span></label>
                                                        
                                                        Sexo:<input type='radio' name='genero' value='masculino' checked>Masculino
                                                        <input type='radio' name='genero' value='femenino'>Femenino
                                                        <br>
                                                        
                                                        </div>
                                            </div>

                                            @if($errors->first('callecli'))
                                            <i>{{$errors->first('callecli')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for=" Calle"> Calle: <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Calle..." class="form-control" id="Calle" type='text' name='callecli'
                                                        value="{{old('callecli')}}">
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
                                                <label class="col-lg-4 col-form-label" for="Numero Exterior"> Numero
                                                    Interior: <span class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Numero..." class="form-control" id="Numero Interior" type='text' name='no_int'
                                                        value="{{old('no_int')}}">
                                                </div>
                                            </div>

                                            @if($errors->first('colcli'))
                                            <i>{{$errors->first('colcli')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Colonia">Colonia: <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Colonia..." class="form-control" id="Colonia" type='text' name='colcli'
                                                        value="{{old('colcli')}}">
                                                </div>
                                            </div>

                                            @if($errors->first('locacli'))
                                            <i>{{$errors->first('locacli')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Localidad">Localidad: <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Localidad..." class="form-control" id="Localidad" type='text' name='locacli'
                                                        value="{{old('locacli')}}">
                                                </div>
                                            </div>

                                            @if($errors->first('muncli'))
                                            <i>{{$errors->first('muncli')}}</i>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="Municipio">Municipio: <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-lg-6">
                                                    <input placeholder="Municipio..." class="form-control" id="Municipio" type='text' name='muncli'
                                                        value="{{old('muncli')}}">
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
                                                            Postal: <span class="text-danger">*</span></label>
                                                        <div class="col-lg-6">
                                                            <input placeholder="CP..." class="form-control" id="Codigo Postal" type='text'
                                                                name='cp' value="{{old('cp')}}">
                                                        </div>
                                                    </div>

                                                    <!--<a href="{{ url('/reporteclientes/') }}" class="btn btn-success">Modificar</a>-->
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

 