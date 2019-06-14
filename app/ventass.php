<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventass extends Model
{
    protected $primaryKey = 'id_vs';
    protected $fillable = ['id_vs', 'id_user','fecha_venta_ser','total_vs'];
    protected $table='ventass';
}
