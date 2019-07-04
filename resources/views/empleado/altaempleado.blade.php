@extends('index')

@section('contenido')

<head>

  <title> Alta Empleado</title>
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
            <form action="{{Route('guardaempleado')}}" method='POST' enctype='multipart/form-data' align="center">
              {{csrf_field()}}
              <h1 align='center'> Alta Empleados</h1>
              <br>
              <br>
              <br>
              @if($errors->first('id_emp'))
              <i>{{$errors->first('id_emp')}}</i>
              @endif
              <br>
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="id">Id: <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input class="form-control" id="id" type='text' name='id_emp' value="{{$idc}}" readonly='readonly'>
                </div>
              </div>

              @if($errors->first('nombre_emp'))
              <i> {{ $errors->first('nombre_emp') }}<i>
                  @endif
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="nombre">Nombre:<span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                      <input placeholder="Nombre..." class="form-control" id="nombre" type='text' name='nombre_emp'
                        value="{{old('nombre_emp')}}" />
                    </div>
                  </div>

                  @if($errors->first('apa_emp'))
                  <i>{{$errors->first('apa_emp')}}</i>
                  @endif
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="paterno">Apellido Paterno: <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                      <input placeholder="Apellido Paterno..." class="form-control" id="paterno" type='text' name='apa_emp'
                        value="{{old('apa_emp')}}" />
                    </div>
                  </div>


                  @if($errors->first('ama_emp'))
                  <i>{{$errors->first('ama_emp')}}</i>
                  @endif
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="materno"> Apellido Materno: <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                      <input placeholder="Apellido Materno..." class="form-control" id="materno" type='text' name='ama_emp'
                        value="{{old('ama_emp')}}" />
                    </div>
                  </div>

                  @if($errors->first('rfc'))
                  <i>{{$errors->first('rfc')}}</i>
                  @endif
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="rfc"> RFC: <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                      <input placeholder="RFC..." class="form-control" id="rfc" type='text' name='rfc' value="{{old('rfc')}}" />
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

                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for=" Telefono"> Genero:<span class="text-danger">*</span></label>

                    <input type='radio' name='genero' value='masculino' checked>Masculino
                    <input type='radio' name='genero' value='femenino'>Femenino
                    <br>

                  </div>
          </div>


          @if($errors->first('telemp'))
          <i>{{$errors->first('telemp')}}</i>
          @endif
          <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="tel">Telefono:<span class="text-danger">*</span></label>
            <div class="col-lg-6">
              <input placeholder="Telefono..." class="form-control" id="tel" type='text' name='telemp' value="{{old('telemp')}}">
            </div>
          </div>

          @if($errors->first('correo'))
          <i> {{ $errors->first('correo') }}<i>
              @endif
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="cor">Correo: <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input placeholder="Correo..." class="form-control" id="cor" type='text' name='correo' value="{{old('correo')}}">
                </div>
              </div>

              @if($errors->first('calle_emp'))
              <i>{{$errors->first('calle_emp')}}</i>
              @endif
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="cal">Calle: <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input placeholder="Calle..." class="form-control" id="cal" type='text' name='calle_emp' value="{{old('calle_emp')}}">
                </div>
              </div>

              @if($errors->first('no_ext'))
              <i>{{$errors->first('no_ext')}}</i>
              @endif
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="ne">Numero Exterior: <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input placeholder="Numero..." class="form-control" id="ne" type='text' name='no_ext' value="{{old('no_ext')}}">
                </div>
              </div>

              @if($errors->first('no_int'))
              <i>{{$errors->first('no_int')}}</i>
              @endif
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="ni">Numero Interior:<span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input placeholder="Numero..." class="form-control" id="ni" type='text' name='no_int' value="{{old('no_int')}}">
                </div>
              </div>

              @if($errors->first('colemp'))
              <i>{{$errors->first('colemp')}}</i>
              @endif
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="col">Colonia: <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input placeholder="Colonia..." class="form-control" id="col" type='text' name='colemp' value="{{old('colemp')}}">
                </div>
              </div>

              @if($errors->first('locaemp'))
              <i>{{$errors->first('locaemp')}}</i>
              @endif
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="lo">Localidad: <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input placeholder="Localidad..." class="form-control" id="lo" type='text' name='locaemp' value="{{old('locaemp')}}">
                </div>
              </div>

              @if($errors->first('munemp'))
              <i>{{$errors->first('munemp')}}</i>
              @endif
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="mun">Municipio: <span class="text-danger">*</span></label>
                <div class="col-lg-6">
                  <input placeholder="Municipio..." class="form-control" id="mun" type='text' name='munemp' value="{{old('munemp')}}">
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
                    <label class="col-lg-4 col-form-label" for="cp">Codigo Postal: <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                      <input placeholder="CP..." class="form-control" id="cp" type='text' name='cp' value="{{old('cp')}}">
                    </div>
                  </div>

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