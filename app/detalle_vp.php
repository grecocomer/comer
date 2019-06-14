<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_vp extends Model
{
    protected $primaryKey = 'id_dvp';
    protected $fillable = ['id_dvp', 'id_vp','cantidad','costo','fecha_venta'];
    protected $table='detalle_vp';
}
