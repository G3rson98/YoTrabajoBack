<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("idPersona");
            $table->unsignedBigInteger("idOficio");
            $table->string("dias");
            $table->string("horaInicio");
            $table->string("horaFin");

            $table->foreign('idPersona')->references('id')->on('personas');
            $table->foreign('idOficio')->references('id')->on('oficios');
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
        Schema::dropIfExists('horarios');
    }
}
