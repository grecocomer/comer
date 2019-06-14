<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Marcaproductos extends Migration
{
    public function up()
    {
    Schema::create('marcaproductos', function (Blueprint $table)
    {
        // llave primaria incremets
        $table->increments('id_marca');
        $table->string('nom_marca',15);
        $table->string('activo',2);
        $table->rememberToken();
        $table->timestamps();
    });
}


public function down()
{
    Schema::drop('marcaproductos');
}
}
