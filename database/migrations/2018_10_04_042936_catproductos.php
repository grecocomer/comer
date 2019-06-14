<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Catproductos extends Migration
{
    public function up()
    {
    Schema::create('catproductos', function (Blueprint $table)
    {
        // llave primaria incremets
        $table->increments('id_cat_producto');
        $table->string('nom_categoria',15);
        $table->string('activo',2);
        $table->rememberToken();
        $table->timestamps();
    });
}


public function down()
{
    Schema::drop('catproductos');
}
}
