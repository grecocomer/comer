<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_vs', function (Blueprint $table) {
            $table->increments('id_dvs');
            $table->integer('id_vs')->unsigned();
            $table->foreign('id_vs')->references('id_vs')->on('ventass');
            $table->integer('id_ser')->unsigned();
            $table->foreign('id_ser')->references('id_ser')->on('servicios');
            $table->integer('id_emp')->unsigned();
            $table->foreign('id_emp')->references('id_emp')->on('empleados');
            $table->float('costo');
            $table->date('fecha_venta');
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
        Schema::drop('detalle_vs');
    }
}
