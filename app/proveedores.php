<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//guardar el registro eliminado

class proveedores extends Model
{

  //  use SoftDeletes;
    protected $primaryKey = 'id_prov';
    protected $fillable = ['id_prov', 'nombre_prov','apa_prov','ama_prov','correo_prov',
                           'tel_prov','genero','calle_prov', 'no_ext','no_int','col_prov',
                           'loca_prov','cp', 'id_es'];

    protected $date=['deleted_at'];
}
