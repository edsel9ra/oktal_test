<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crias', function (Blueprint $table) {
            $table->id();
            $table->string('NombreCria');
            $table->char('Sexo', 1);
            $table->date('FechaNacimiento');
            $table->string('Color');
            $table->unsignedBigInteger('id_padre');
            $table->foreign('id_padre')->references('id')->on('padres');
            $table->unsignedBigInteger('id_madre');
            $table->foreign('id_madre')->references('id')->on('madres');
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
        Schema::dropIfExists('crias');
    }
}
