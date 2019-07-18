<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventasp extends Model
{
    protected $primaryKey = 'id_vp';
    protected $fillable = ['id_vp','idc','fecha_venta'];
    protected $table='ventasp';

}
