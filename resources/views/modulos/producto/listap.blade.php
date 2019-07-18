<div class="container mt-4 " >
        <div class="card">
        <div class="card-body">

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">Clave Producto</th>
            <th scope="col">Producto</th>
            <th scope="col">Imagen</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Costo</th>
            <th scope="col">Subtotal</td>
            <th scope="col">Operaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($resultado as $res)
        <tr>
            <th scope="row">{{$res->id_prod}}</th>
            <td>{{$res->nombre_prod}}</td>
            <td><img src="{{asset('Archivo/'. $res->Archivo)}}" height=50 windth=50></td>
            <td>{{$res->cantidad}}</td>
            <td>{{$res->costo}}</td>
            <th>{{$res->subt}}</th>
            <td>
                <form action='' method='POST' enctype='application/x-www-form-urlencoded' 
                name='frmdo{{$res->id_dvp}}' id='frmdo{{$res->id_dvp}}' target='_self'>
                    <input type='text' value='{{$res->id_dvp}}' name='id_dvp' id='id_dvp'>
                    <input type = 'text' value = '{{$res->cantidad}}' name = 'canti' id= 'canti'>
                    <input type='button' name='borrar' class='borrar' value='borrar' />
                </form>
            </td>
        </tr>
        @endforeach
        </tr>
            <tr><td colspan= 5>Subtotal</td><td>{{$resultado2->subtotal}}</td></tr>
            <tr><td colspan= 5>IVA</td><td>{{$resultado2->iva}}</td></tr>
            <tr><td colspan= 5>Total</td><td>{{$resultado2->total}}</td>
            </tr>
    </tbody>
</table>
<script type="text/javascript">
    $(function () {
	$('.borrar').click(
		function () {
			formulario = this.form;
            $("#carrito").load('{{url('borraventas')}}' + '?' + $(this).closest('form').serialize()) ;
            //$("#Existencia").val(parseInt($("#Existencia").val())+parseInt($("#canti").val()));
		});
});
</script>
</div>
</div>
</div>
