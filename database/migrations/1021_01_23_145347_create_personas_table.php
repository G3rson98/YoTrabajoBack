<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->integer('ci');
            $table->string('nombre');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('direccion');
            $table->integer('telefono');
            $table->date('fechaNacimiento');
            $table->date('fechaRegistro');
            $table->string('foto')->nullable();
            $table->integer('longitud')->nullable();
            $table->integer('latitud')->nullable();
            $table->smallInteger('calificacionPromedio')->nullable();
            $table->string('fotoCi')->nullable();
            $table->string('fotoAntecedentesPenales')->nullable();
            $table->string('fotoSelfieCi')->nullable();

            $table->enum('tipo', ['empleador', 'empleado','administrador']);
            $table->enum('estado', ['activo', 'inactivo']);
            $table->enum('sancion', ['activo', 'inactivo']);
            $table->enum('estadoRegistro', ['aprobado', 'denegado','espera'])->nullable();
            
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
        Schema::dropIfExists('personas');
    }
}
