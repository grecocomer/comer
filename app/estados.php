<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    protected $primaryKey = 'id_es';
    protected $fillable = ['id_es', 'estado', 'activo'];
}
