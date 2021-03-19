<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->string("nombredetalle");
            $table->string("encargo");
            $table->unsignedBigInteger("idContratante")->nullable();
            $table->unsignedBigInteger("idTrabajo")->nullable();
            $table->foreign('idContratante')->references('id')->on('personas');
            $table->foreign('idTrabajo')->references('id')->on('trabajos');
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
        Schema::dropIfExists('detalles');
    }
}
