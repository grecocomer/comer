<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proveedores extends Migration
{
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table)
    {
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
         $table->integer('cp');
         $table->integer('id_es')->unsigned();
         $table->foreign('id_es')->references('id_es')->on('estados');
         $table->timestamp('deleted_at')->nullable();
         $table->rememberToken();
         $table->timestamps();
    });
    }



    public function down()
    {
        Schema::drop('proveedores');
    }

}
