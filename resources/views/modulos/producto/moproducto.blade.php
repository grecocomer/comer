@extends('index')

@section("contenido")

<head>
    <title>Modulo Productos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="jquery/jquery-3.3.1.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<div class="container-fluid">

<script type="text/javascript">
		$(document).ready(function(){
			
            $("#id_cat_producto").click(function() {
				$("#id_prod").load('{{url('combopro')}}' + '?id_cat_producto=' + this.options[this.selectedIndex].value) ;
               //alert('hola00')
		});

        $("#id_prod").click(function() {
				$("#datos").load('{{url('detallep')}}' + '?id_prod=' + this.options[this.selectedIndex].value) ;
               ///alert('hola00')
            });

            $("#cantidad").keyup(function() {
                var Existencia;
            var cantidad;
            Existencia = parseInt($("#Existencia").val());
            cantidad = parseInt($("#cantidad").val());
            if (cantidad>Existencia)
            {
                $("#status").html('<div class="alert alert-danger" role="alert"><h6 class="alert-heading">Te la pelaste</h6></div>  '); 
          $('#agrega').attr("disabled", true);
            $('#total').val(0); 
            
            
            }
            else
            {
                $("#status").html('<div class="alert alert-success" role="alert"><h6 class="alert-heading">Si se puede</h6></div>  '); 
                 $('#agrega').attr("disabled", false);
              $('#total').val( $("#costo").val() *  $("#cantidad").val());
              
            }
       });

       $("#cantidad").keyup(function() {
        var costo = parseInt($("#costo").val());
                   var cantidad =  parseInt($("#cantidad").val()); 
                   var total =  $("#total").val(); 
           
            
                cantidad = $("#cantidad").val();
                       valor = $("#total").val();
                       total1 = ((parseInt(costo)*parseInt(cantidad)));

                       if(cantidad >= 5 ){
                          valor = total1 - 100;
                          $('#tip1').attr('disabled', false);
					$('#tip2').attr('disabled', true);
					$("#tip1").prop("checked", true);
                       }else{ 
                           valor=total1;
                           $('#tip1').attr('disabled', true);
					$('#tip2').attr('disabled', false);
					$("#tip2").prop("checked", true);
                       }
                       $('#total').val(valor);
       });

       $("#agrega").click(function() {
         $("#carrito").load('{{url('carrito')}}' + '?' + $(this).closest('form').serialize()) ;
       });

		});


	</script>

	

    <div class="container mt-4 " >
        <div class="card">
            <div class="card-header">
                Modulos Productos
            </div>
<form>
            <div class="card-body">

                <div class="row mt-3">
                    <div class="col-md-1">
                        <label for="">No.Vta:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="id_vp" id="id_vp"  value = '{{$id_vp}}' readonly = 'readonly' class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="">Fecha Venta:</label>
                    </div>
                    <div class="col-md-2">
                        <input name="fecha_venta" id="fecha_venta" value='{{$fecha_venta}}' class="form-control"  readonly = 'readonly'>
                    </div>

                    <div class="col-md-2">
                        <label for="">Nombre Cliente:</label>
                    </div>
                    <div class="col-md-2">
                    <input name="id" id="id" value="{{Session::get('sesionidu')}}" class="form-control"  readonly = 'readonly'>
                    <!-- <input type="text" name="cli" id="cli" class="form-control">-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">
                        <label for="">Seleccione Categoria:</label>
                    </div>
                    <div class="col-md-10">
                        <select name='id_cat_producto' id='id_cat_producto' class="form-control">
                        @foreach($catproductos as $cat)
		             	<option value = '{{$cat->id_cat_producto}}'>{{$cat->nom_categoria}}</option>
		            	@endforeach
                        </select>
                    </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-2">
                            <label for="">Seleccione Producto:</label>
                        </div>
                        <div class="col-md-10">
                        <div id="ten">
                            <select name='id_prod' id='id_prod' class="form-control">
                            </select>
                        </div>
                        </div>
                        </div>
                        
                        <div id='datos'>
                        <div class="row mt-3 ">
    <div class="col-md-2">
        <label for="">Descripcion:</label>
    </div>
    <div class="col-md-4">
        <input type="text" name="descripcion_prod" id="descripcion_prod"
            readonly='readonly' class="form-control">
    </div>
    <div class="col-md-2">

        <label for="">Imagen Producto:</label>
    </div>
    <div class="col-md-4">
        <input type="text" name="archivo" id="archivo"  readonly='readonly'
            class="form-control">
    </div>
</div>


<div class="row mt-3 ">
    <div class="col-md-2">
        <label for="">Existencia:</label>
    </div>
    <div class="col-md-2">
        <input type="text" name="Existencia" id="Existencia"  readonly='readonly'
            class="form-control">
    </div>
    <div class="col-md-2">
        <label for="">Precio:</label>
    </div>
    <div class="col-md-2">
        <input type="text" name="costo" id="costo" readonly='readonly'
            class="form-control">
    </div>
    <div class="col-md-2">
        <label for="">Marca:</label>
    </div>
    <div class="col-md-2">
        <input type="text" name="marca" id="marca"  readonly='readonly'
            class="form-control">
    </div>
</div>     
                        </div>  

                <div class="row mt-4 ">
                <div class="col-md-2">
                        <label for="">Cantidad:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="cantidad" id="cantidad" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="">Total:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="total" id="total" readonly='readonly' class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="">Valorar:</label>
                    </div>
                    <div class="col-md-3" id="status">
                    
                    </div>
                     
                <br>
                <br>
                <br>
                <div id="rad" class="mx-auto" style="width: 200px;" >
			<input type="radio" name="tip1" id="tip1">Si Descuento
            <br>
            <br>
            <input type="radio" name="tip2" id="tip2">No Descuento
		     </div>
                <br>
                <br>
                <br>
                <br>

                    <button type="button" class="btn btn-primary btn-lg btn-block" name = "agrega" id="agrega" disabled= 'false'>Agrega Carrito</button>


                    

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id='carrito'>
</div>
    
    </form>
 
<div>
@stop
