<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();

            $table->string('Nombre');
            $table->string('NumJugadores');
            $table->string('Genero');
            $table->string('EdadRecomendada');
            $table->string('Foto');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('SUBcategoria_id');

            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juegos');
    }
}
