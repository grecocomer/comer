<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('productos', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id_prod');
            $table->string('nombre_prod',40);
            $table->string('archivo',255);
            $table->string('descripcion_prod',40);
            $table->string('Existencia');
            $table->string('costo');
            $table->integer('u_m');
            $table->string('contenido');
            $table->string('activo',2);
            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca')->references('id_marca')->on('marcaproductos');
            $table->integer('id_cat_producto')->unsigned();
            $table->foreign('id_cat_producto')->references('id_cat_producto')->on('catproductos');
            $table->softDeletes();
            $table->timestamps();
            $table->engine ='InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos');
    }
}
