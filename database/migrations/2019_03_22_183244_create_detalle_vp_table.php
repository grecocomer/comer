<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('detalle_vp', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id_dvp');
            $table->integer('id_vp')->unsigned();
            $table->foreign('id_vp')->references('id_vp')->on('ventasp');
            $table->integer('id_prod')->unsigned();
            $table->foreign('id_prod')->references('id_prod')->on('productos');
            $table->integer('cantidad');
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
        Schema::drop('detalle_vp');
    }
}
