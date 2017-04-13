<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubEscenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_escenarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('area');
            $table->integer('puntos');
            $table->string('color',10);//COLOR DE CLASE
            $table->string('fondo',140);//imagen de fondo
            $table->integer('escenario_id')->unsigned();
            
            $table->foreign('escenario_id')->references('id')->on('escenarios')
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
        Schema::dropIfExists('sub_escenarios');
    }
}
