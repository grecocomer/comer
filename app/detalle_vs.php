<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_vs extends Model
{
    protected $primaryKey = 'id_dvs';
    protected $fillable = ['id_dvs', 'id_vs','id_ser','id_emp','fecha_venta','cantidad','costo'];
    protected $table='detalle_vs';
}
