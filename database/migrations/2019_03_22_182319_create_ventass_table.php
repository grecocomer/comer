<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateVentassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('ventass', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id_vs');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('clientes');
            $table->date('fecha_venta_ser');
            $table->float('total_vs');
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
        Schema::drop('ventass');
    }
}
