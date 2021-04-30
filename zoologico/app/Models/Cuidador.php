<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;
use App\Models\Cria;

class Cuidador extends Model
{
    use HasFactory;

    public function animals()
    {
        return $this->hasMany(Animal::class, 'id');
    }

    public function crias()
    {
        return $this->hasMany(Cria::class, 'id');
    }
}
