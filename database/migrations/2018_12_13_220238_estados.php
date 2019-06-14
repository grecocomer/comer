<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Estados extends Migration
{
    
    public function up()
    {
        Schema::create('estados', function (Blueprint $table)
        {
            // llave primaria incremets
            $table->increments('id_es');
            $table->string('estado',100);
            $table->string('activo',2);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Shema::drop('estados');
    }
}
