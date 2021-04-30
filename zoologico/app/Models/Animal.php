<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cuidador;
use App\Models\Jaula;
use App\Models\Padre;
use App\Models\Madre;

class Animal extends Model
{
    use HasFactory;

    public function cuidador()
    {
        return $this->belongsTo(Cuidador::class, 'id_cuidador');
    }

    public function jaula()
    {
        return $this->belongsTo(Jaula::class, 'id_jaula');
    }

    public function padre()
    {
        return $this->hasOne(Padre::class, 'id');
    }

    public function madre()
    {
        return $this->hasOne(Madre::class, 'id');
    }

}
