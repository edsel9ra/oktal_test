<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('NombreAnimal');
            $table->string('Especie');
            $table->char('Sexo', 1);
            $table->date('FechaNacimiento');
            $table->date('FechaIngreso');
            $table->string('Color');
            $table->unsignedBigInteger('id_jaula');
            $table->foreign('id_jaula')->references('id')->on('jaulas');
            $table->unsignedBigInteger('id_cuidador');
            $table->foreign('id_cuidador')->references('id')->on('cuidadors');
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
        Schema::dropIfExists('animals');
    }
}
