<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventasp extends Model
{
    protected $primaryKey = 'id_vp';
    protected $fillable = ['id_vp', 'id_user','fecha_venta','total'];
    protected $table='ventasp';

}
