@foreach($servicios as $ser)
<option value = '{{$ser->id_ser}}'>{{$ser->nombre_ser}}</option>
@endforeach