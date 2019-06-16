<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//guardar el registro eliminado

class empleados extends Model
{
    
    use SoftDeletes;
    
    protected $primaryKey = 'id_emp';
        protected $fillable = ['id_emp', 'nombre_emp','apa_emp','ama_emp','rfc',
        'telemp','genero','correo','calle_emp', 'no_ext','no_int','colemp','locaemp','cp', 'id_es'];

        protected $date=['deleted_at'];
}
