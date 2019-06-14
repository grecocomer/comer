<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('proveedores', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id_prov');
            $table->string('nombre_prov',40);
            $table->string('apa_prov',40);
            $table->string('ama_prov',40);
            $table->string('archivo',255);
            $table->string('correo_prov',40);
            $table->integer('tel_prov');
            $table->string('genero',10);
            $table->string('calle_prov',40);
            $table->integer('no_ext');
            $table->integer('no_int');
            $table->string('col_prov',40);
            $table->string('loca_prov',40);
            $table->string('esta_prov',40);
            $table->integer('cp');
            $table->integer('id_es')->unsigned();
            $table->foreign('id_es')->references('id_es')->on('estados');
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
        Schema::drop('proveedores');
    }
}
