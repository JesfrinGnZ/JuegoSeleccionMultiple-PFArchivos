<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');//pk
            $table->text('descripcion');
            $table->bigInteger('no_respuestas')->nullable();
            $table->bigInteger('tiempo');
            $table->unsignedBigInteger('cuestionario_id');
            $table->foreign('cuestionario_id')->references('id')->on('cuestionarios');//foreign_key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
