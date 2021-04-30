<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cuidador;
use App\Models\Jaula;
use App\Models\Padre;
use App\Models\Madre;

class Cria extends Model
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

    public function padres()
    {
        return $this->belongsTo(Padre::class, 'id_padre');
    }

    public function madres()
    {
        return $this->belongsTo(Madre::class, 'id_madre');
    }
}
