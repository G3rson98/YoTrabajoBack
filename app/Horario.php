<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'idPersona','idOficio','dias','horaInicio','horaFin'
    ];


    public function Personas()
    {
        return $this->belongsTo(Persona::class);
    }
    public function Oficios()
    {
        return $this->belongsTo(Oficio::class);
    }
}
