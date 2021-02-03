<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    //
    protected $casts = [
        'fechaInicio' => 'datetime:d/m/Y', 
        'fechaFin' => 'datetime:d/m/Y',
    ];
    protected $fillable =[
        'fechaInicio',
        'fechaFin',
        'cantidadDias',
        'estado',
        'justificacion',
        'tipo',
    ];
    public function persona()
    {
        return $this->hasMany(sancion::class);
    }
}
