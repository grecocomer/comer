@extends('index')

@section("contenido")

<head>
    <title>Modulo Servicio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="jquery/jquery-3.3.1.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<div class="container-fluid">

<script type="text/javascript">
		$(document).ready(function(){
			
            $("#id_cat_ser").click(function() {
				$("#id_ser").load('{{url('comboser')}}' + '?id_cat_ser=' + this.options[this.selectedIndex].value) ;
               //alert('hola00')
		});

        $("#id_ser").click(function() {
				$("#datos").load('{{url('detalles')}}' + '?id_ser=' + this.options[this.selectedIndex].value) ;
               ///alert('hola00')
            });

            $("#cantidad").keyup(function() {
        var costo = parseInt($("#costo").val());
                   var cantidad =  parseInt($("#cantidad").val()); 
                   var total =  $("#total").val(); 
           
            
                cantidad = $("#cantidad").val();
                       valor = $("#total").val();
                       total1 = ((parseInt(costo)*parseInt(cantidad)));

                       if(cantidad >= 3 ){
                          valor = total1 - 1000;
                       }else{ 
                           valor=total1;
                       }
                       $('#total').val(valor);
       });

       $("#cantidad").keyup(function() {
            var cantidad;
            cantidad = parseInt($("#cantidad").val());
            if (cantidad >=5)
            {
                $("#status").html('<div class="alert alert-danger" role="alert"><h6 class="alert-heading">TE la pelaste</h6></div>  '); 
          $('#agrega').attr("disabled", true);
            $('#total').val(0); 
            
            
            }
            else
            {
                $("#status").html('<div class="alert alert-success" role="alert"><h6 class="alert-heading">Si se puede</h6></div>  '); 
                 $('#agrega').attr("disabled", false);
              
            }
       });

       $("#agrega").click(function() {
         $("#carritos").load('{{url('carritos')}}' + '?' + $(this).closest('form').serialize()) ;
       });


		});

        </script>

    <div class="container mt-4 " >
        <div class="card">
            <div class="card-header">
                Modulo Servicio
            </div>
<form>
            <div class="card-body">

                <div class="row mt-3">
                    <div class="col-md-1">
                        <label for="">No.Vta:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="id_vs" id="id_vs"  value = '{{$id_vs}}' readonly = 'readonly' class="form-control">
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
                    <input name="id" id="id" value="{{Session::get('sesionidu')}}"  class="form-control"  readonly = 'readonly'>
                    <!-- <input type="text" name="cli" id="cli" class="form-control">-->
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-2">
                        <label for="">Seleccione Categoria:</label>
                    </div>
                    <div class="col-md-10">
                        <select name='id_cat_ser' id='id_cat_ser' class="form-control">
                        @foreach($catservicios as $cat)
		             	<option value = '{{$cat->id_cat_ser}}'>{{$cat->nom_cate}}</option>
		            	@endforeach
                        </select>
                    </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-2">
                            <label for="">Seleccione Trabajo:</label>
                        </div>
                        <div class="col-md-10">
                        <div id="ten">
                            <select name='id_ser' id='id_ser' class="form-control">
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
        <label for="">Precio:</label>
    </div>
    <div class="col-md-4">
        <input type="text" name="costo" id="costo" readonly='readonly'
            class="form-control">
    </div>
</div>     
                        </div>  

                        <div class="row mt-3">
                        <div class="col-md-2">
                            <label for="">Seleccione Trabajador:</label>
                        </div>
                        <div class="col-md-10">
                        <div id="ten">
                        <select name='id_emp' id='id_emp' class="form-control" >
                        @foreach($id_emp as $cat)
		             	<option placeholder="Seleccione Trabajador..." value = '{{$cat->id_emp}}'>{{$cat->nombre_emp}}</option>
		            	@endforeach
                        </select>
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
                <br>
                <br>

                    <button type="button" class="btn btn-primary btn-lg btn-block" 
                    name = "agrega" id="agrega" disabled= 'false'>Agrega Carrito</button>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id='carritos'>
</div>
    
    </form>
 </div>
@stop

