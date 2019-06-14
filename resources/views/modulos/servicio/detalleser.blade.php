<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">

<div class="row mt-3 ">
    <div class="col-md-2">
        <label for="">Descripcion:</label>
    </div>
    <div class="col-md-4">
        <input type="text" name="descripcion_ser" id="descripcion_ser" value='{{$servicios->descripcion_ser}}' readonly='readonly' class="form-control">
    </div>


    <div class="col-md-2">
        <label for="">Precio:</label>
    </div>
    <div class="col-md-4">
        <input type="text" name="costo" id="costo"  value='{{$servicios->costo}}'  readonly='readonly' class="form-control">
    </div>
</div>
</div>




    <!--
                <div class="row mt-3 ">
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
                        <input type="text" name="total" id="total" class="form-control">
                    </div>
                </div>
                <div id='valida'>
                               </div>
                               -->