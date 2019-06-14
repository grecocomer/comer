<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">

<div class="row mt-3 ">
    <div class="col-md-2">
        <label for="">Descripcion:</label>
    </div>
    <div class="col-md-4">
        <input type="text" name="descripcion_prod" id="descripcion_prod" value='{{$productos->descripcion_prod}}'
            readonly='readonly' class="form-control">
    </div>
    <div class="col-md-2">

        <label for="">Imagen Producto:</label>
    </div>
    <div class="col-md-4">
        <input type="text" name="archivo" id="archivo" value='{{$productos->archivo}}' readonly='readonly'
            class="form-control">
    </div>
</div>


<div class="row mt-3 ">
    <div class="col-md-2">
        <label for="">Existencia:</label>
    </div>
    <div class="col-md-2">
        <input type="text" name="Existencia" id="Existencia" value='{{$productos->Existencia}}' readonly='readonly'
            class="form-control">
    </div>
    <div class="col-md-2">
        <label for="">Precio:</label>
    </div>
    <div class="col-md-2">
        <input type="text" name="costo" id="costo" value='{{$productos->costo}}' readonly='readonly'
            class="form-control">
    </div>

    <div class="col-md-2">
        <label for="">Marca:</label>
    </div>
    <div class="col-md-2">
        <input type="text" name="marca" id="marca" value='{{$productos->nomarc}}' readonly='readonly'
            class="form-control">
    </div>
</div>
