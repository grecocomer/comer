<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('servicios', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id_ser');
            $table->string('nombre_ser',40);
            $table->string('descripcion_ser',40);
            $table->integer('costo');
            $table->string('fecha_solicitud_ser');
            $table->string('fecha_inicio_ser');
            $table->string('fecha_fin_ser');
            $table->integer('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas');
            $table->integer('id_emp')->unsigned();
            $table->foreign('id_emp')->references('id_emp')->on('empleados');
            $table->integer('id_cat_ser')->unsigned();
            $table->foreign('id_cat_ser')->references('id_cat_ser')->on('catservicios');
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
        Schema::drop('servicios');
    }
}
