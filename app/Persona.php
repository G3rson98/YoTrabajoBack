<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //

    protected $fillable = [
        'ci',
        'nombre',
        'apellidoP',
        'apellidoM',
        'direccion',
        'telefono',
        'fechaNacimiento',
        'fechaRegistro',
        'foto',
        'longitud',
        'latitud',
        'calificacionPromedio',
        'fotoCi',
        'fotoAntecedentesPenales',
        'fotoSelfieCi',
        'tipo',
    ];

    public function sancion()
    {
        return $this->hasMany(sancion::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }


}
