<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('mensaje');
            $table->string('leido',2);
            $table->datetime('fecha');
            $table->boolean('todos');

            $table->integer('emisor_user_id')->unsigned();
            $table->integer('receptor_user_id')->unsigned()->nullable();
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}
