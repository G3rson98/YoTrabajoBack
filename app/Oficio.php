<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficio extends Model
{
    //

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

}
