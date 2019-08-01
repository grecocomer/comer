<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    public function up()
    {
    Schema::create('productos', function (Blueprint $table)
    {
         // llave primaria incremets
         $table->increments('id_prod');
         $table->string('nombre_prod',40);
         $table->string('archivo',255);
         $table->string('descripcion_prod',40);
         $table->string('Existencia',50);
         $table->string('tipo',20);
         $table->string('costo',50);
         $table->integer('u_m');
         $table->string('contenido',255);
         $table->string('activo',2);
         $table->integer('id_marca')->unsigned();
         $table->foreign('id_marca')->references('id_marca')->on('marcaproductos');
         $table->integer('id_cat_producto')->unsigned();
         $table->foreign('id_cat_producto')->references('id_cat_producto')->on('catproductos');
         $table->timestamp('deleted_at')->nullable();
         $table->rememberToken();
         $table->timestamps();
    });
    }



    public function down()
    {
        Schema::drop('productos');
    }
}
