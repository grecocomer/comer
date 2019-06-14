<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catproductos extends Model
{
    protected $primaryKey = 'id_cat_producto';
    protected $fillable = ['id_cat_producto', 'nom_categoria'];

    protected $table='catproductos';

}
