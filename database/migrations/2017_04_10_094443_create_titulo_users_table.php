<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTituloUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulo_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('titulo_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->datetime('fecha');
            
            $table->foreign('titulo_id')->references('id')->on('titulos')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(array('user_id', 'titulo_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulo_users');
    }
}
