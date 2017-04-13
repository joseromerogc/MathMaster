<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('intentos');
            $table->string('pista',2)->nullable();;
            $table->string('superada',2);
            $table->datetime('iniciado');
            $table->datetime('finalizado')->nullable();

            $table->integer('pregunta_id')->unsigned();
            $table->integer('user_id')->unsigned();
            
            $table->foreign('pregunta_id')->references('id')->on('preguntas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(array('user_id', 'pregunta_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta_users');
    }
}
