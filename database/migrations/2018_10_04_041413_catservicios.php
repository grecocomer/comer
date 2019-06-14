<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Catservicios extends Migration
{
    public function up()
    {
        Schema::create('catservicios', function (Blueprint $table)
        {
            // llave primaria incremets
            $table->increments('id_cat_ser');
            $table->string('nom_cate',50);
            $table->string('activo',2);
            $table->rememberToken();
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::drop('catservicios');
    }

}
