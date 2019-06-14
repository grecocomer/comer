<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatproductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('catproductos', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id_cat_producto');
            $table->string('nom_categoria',15);
            $table->string('activo',2);
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
        Schema::drop('catproductos');
    }
}
