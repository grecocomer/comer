<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('empleados', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id_emp');
            $table->string('nombre_emp',40);
            $table->string('apa_emp',40);
            $table->string('ama_emp',40);
            $table->string('rfc',40);
            $table->string('archivo',255);
            $table->integer('telemp');
            $table->string('correo',40);
            $table->string('genero',10);
            $table->string('calle_emp',40);
            $table->integer('no_ext');
            $table->integer('no_int');
            $table->string('colemp',40);
            $table->string('locaemp',40);
            $table->string('estaemp',40);
            $table->integer('cp');
            $table->integer('id_es')->unsigned();
            $table->foreign('id_es')->references('id_es')->on('estados');
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
        Schema::drop('empleados');
    }
}
