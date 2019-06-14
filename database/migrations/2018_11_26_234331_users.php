<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            // llave primaria incremets
         $table->increments('id_user');
         $table->string('nombre_user');
         $table->string('contrasena');
         $table->string('correo');
         $table->string('tipo_user');
         $table->rememberToken();
         $table->timestamps();
         $table->softDeletes();
        });
    }

   
    public function down()
    {
        Schema::drop('users');
    }
}
