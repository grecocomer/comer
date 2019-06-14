<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catservicios extends Model
{
    protected $primaryKey = 'id_cat_ser';
    protected $fillable = ['id_cat_ser', 'nom_cate'];
}
