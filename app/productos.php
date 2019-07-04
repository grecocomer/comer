<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//guardar el registro eliminado
class productos extends Model
{
    use SoftDeletes;
    

    //cambiar los valores al igual que la migracion
    protected $primaryKey = 'id_prod';
    protected $fillable = ['id_prod', 'nombre_prod','descripcion_prod','existencia','tipo','costo',
    'u_m','contenido', 'id_marca','id_cat_producto'];

    protected $date=['deleted_at'];
    protected $table='productos';
   
   

}
