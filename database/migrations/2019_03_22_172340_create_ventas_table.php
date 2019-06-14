<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('ventasp', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id_vp');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('clientes');
            $table->date('fecha_venta');
            $table->float('total_vp');
            $table->softDeletes();
            $table->timestamps();
            $table->engine ='InnoDB';

            /*Foreign keys*/



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ventasp');
    }
}
