<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    
    protected $casts = [
        'fechaNacimiento'=> 'datetime:d-m-Y',
        'fechaRegistro'=> 'datetime:d-m-Y',
        'created_at' => 'datetime:d-m-Y', // Change your format
        'updated_at' => 'datetime:d-m-Y',
    ];

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
        'token'
    ];

    public function sancion()
    {
        return $this->hasMany(sancion::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
    public function trabajo()
    {
        return $this->hasMany(Trabajo::class);
    }
    public function detalle()
    {
        return $this->hasMany(Detalle::class);
    }


}
