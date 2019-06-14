<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    protected $primarykey = 'id_pedido';
    protected $fillable = ['id_pedido','fecha_pedido','id_pro','id_prod'];
}
