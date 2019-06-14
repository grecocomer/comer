<div class="container mt-4 " >
        <div class="card">
        <div class="card-body">

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">Clave Servicio</th>
            <th scope="col">Servicio</th>
            <th scope="col">ID Empleado</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Costo</th>
            <th scope="col">Operaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($resultado as $res)
        <tr>
            <th scope="row">{{$res->id_ser}}</th>
            <td>{{$res->nombre_ser}}</td>
            <th >{{$res->id_emp}}</th>
            <td>{{$res->cantidad}}</td>
            <td>{{$res->costo}}</td>
            <td>
                <form action='' method='POST' enctype='application/x-www-form-urlencoded' name='frmdo{{$res->id_dvs}}'
                    id='frmdo{{$res->id_dvs}}' target='_self'>
                    <input type='text' value='{{$res->id_dvs}}' name='id_dvs' id='id_dvs'>
                    <input type='button' name='borrars' class='borrars' value='borrars' />
                </form>
            </td>
        </tr>
        @endforeach
        </tr>
        <tr>
            <td colspan=5>Total</td>
            <td>{{$resultado2->total}}</td>
        </tr>
    </tbody>
</table>
<script type="text/javascript">
    $(function () {
        $('.borrars').click(
		function () {
			formulario = this.form;
            $("#carritos").load('{{url('borraventass')}}' + '?' + $(this).closest('form').serialize()) ;
		});

});
</script>
</div>
</div>
</div>
