<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresas extends Migration
{
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table)
        {
            // llave primaria incremets
            $table->increments('id_empresa');
            $table->string('nombre_empresa',50);
            $table->string('tipo_empresa',50);
            $table->timestamp('deleted_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::drop('empresas');
    }
}
