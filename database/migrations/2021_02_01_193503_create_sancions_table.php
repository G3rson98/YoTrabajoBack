<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSancionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sancions', function (Blueprint $table) {
            $table->id();
            $table->date('fechaInicio')->format('d/m/Y');
            $table->date('fechaFin')->format('d/m/Y');
            $table->smallInteger('cantidadDias');            
            $table->string('justificacion');
            $table->enum('estado', ['activo', 'inactivo']);

            $table->unsignedBigInteger('idPersona')->nullable();
            $table->foreign('idPersona')->references('id')->on('personas');

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
        Schema::dropIfExists('sancions');
    }
}
