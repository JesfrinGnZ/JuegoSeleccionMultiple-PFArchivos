<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionarioRealizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionario_realizados', function (Blueprint $table) {
            $table->bigIncrements('id');//pk
            $table->string('codigo_generado');
            $table->unsignedBigInteger('cuestionario_id');
            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios');//foreign_key
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuestionario_realizados');
    }
}
