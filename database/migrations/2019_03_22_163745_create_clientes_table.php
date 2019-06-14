<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('clientes', function (Blueprint $table) {
            // llave primaria incremets
            $table->increments('id');
            $table->string('nombrecli',40);
            $table->string('apacli',40);
            $table->string('amacli',40);
            $table->string('archivo',255);
            $table->string('correocli',40);
            $table->integer('telcli');
            $table->string('genero',10);
            $table->string('callecli',40);
            $table->integer('no_ext');
            $table->integer('no_int');
            $table->string('colcli',40);
            $table->string('locacli',40);
            $table->string('muncli',40);
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
        Schema::drop('clientes');
    }
}
