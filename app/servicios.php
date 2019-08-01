<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//guardar el registro eliminado

class servicios extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_ser';
    protected $fillable = ['id_ser','nombre_ser','descripcion_ser','costo','fecha_solicitud_ser','fecha_inicio_ser',
    'fecha_fin_ser','id_empresa','id_emp','id_cat_ser'];

    protected $date=['deleted_at'];
}
