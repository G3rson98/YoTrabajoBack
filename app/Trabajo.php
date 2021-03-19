<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{

    protected $fillable = [
        "direccion",
        "horario",
        "idEmpleado"
    ];

    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
