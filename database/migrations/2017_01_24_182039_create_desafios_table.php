<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateDesafiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desafios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->text('planteamiento');
            $table->integer('nivel');
            $table->string('color',10);//COLOR DE CLASE
            $table->string('fondo',140);//imagen de fondo
            $table->integer('sub_escenario_id')->unsigned();
            
            $table->foreign('sub_escenario_id')->references('id')->on('sub_escenarios')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desafios');
    }
}
