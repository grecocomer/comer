<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('pedidos', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id_pedido');
            $table->string('fecha_pedido');
            $table->string('fecha_entrega');
            $table->integer('id_prov')->unsigned();
            $table->foreign('id_prov')->references('id_prov')->on('proveedores');
            $table->integer('id_prod')->unsigned();
            $table->foreign('id_prod')->references('id_prod')->on('productos');


            /* $table->integer('id_s')->unsigned();
                $table->foreign('id_s')->references('id_s')->on('generos');
              **/
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
        Schema::drop('pedidos');
    }
}
