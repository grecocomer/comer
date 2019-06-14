<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//guardar el registro eliminado

class empresas extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_empresa';
    protected $fillable = ['id_empresa', 'nombre_empresa','tipo_empresa','activo'];

    protected $date=['deleted_at'];


}
