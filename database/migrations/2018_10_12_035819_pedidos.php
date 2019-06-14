<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedidos extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table)
    {
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
      $table->timestamp('deleted_at')->nullable();
         $table->rememberToken();
         $table->timestamps();
    });
    }
    
    public function down()
    {
       
        Schema::drop('pedidos');
    }
}
