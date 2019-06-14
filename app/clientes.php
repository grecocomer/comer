<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//guardar el registro eliminado

class clientes extends Model

    {
        use SoftDeletes;
        
        protected $primaryKey = 'id';
        protected $fillable = ['id', 'nombrecli','apacli','archivo','amacli','correocli',
        'telcli','genero','callecli', 'no_ext','no_int','colcli','locacli','muncli',
         'cp', 'id_es'];

        protected $date=['deleted_at'];
    }
    

