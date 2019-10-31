<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuestionarios', function (Blueprint $table) {
            $table->bigIncrements('id');//primary_key
            $table->string('nombre');
            $table->text('descripcion');
            $table->tinyInteger('activo')->nullable();
            $table->unsignedBigInteger('administrador_id');
            $table->foreign('administrador_id')->references('id')->on('administradors');//foreign_key
            //$table->string(cod_juego);
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
        Schema::dropIfExists('cuestionarios');
    }
}
