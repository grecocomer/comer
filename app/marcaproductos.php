<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marcaproductos extends Model
{
    protected $primaryKey = 'id_marca';
    protected $fillable = ['id_marca', 'nom_marca'];
}
