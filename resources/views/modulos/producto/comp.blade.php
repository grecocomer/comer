@foreach($productos as $pro)
<option value = '{{$pro->id_prod}}'>{{$pro->nombre_prod}}</option>
@endforeach