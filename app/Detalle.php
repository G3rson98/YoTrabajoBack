<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{

    protected $fillable = [
        "nombredetalle",
        "encargo",
        "idContratante",
        "idTrabajo",
    ];
    public function trabajo()
    {
        return $this->belongsTo(Trabajo::class);
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
