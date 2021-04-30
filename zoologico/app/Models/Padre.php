<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;
use App\Models\Cria;

class Padre extends Model
{
    use HasFactory;

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id_animal');
    }

    public function crias()
    {
        return $this->hasMany(Cria::class, 'id');
    }
}
