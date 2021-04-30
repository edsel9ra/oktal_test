<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;
use App\Models\Cria;

class Jaula extends Model
{
    use HasFactory;

    public function animals()
    {
        return $this->hasOne(Animal::class, 'id');
    }

    public function crias()
    {
        return $this->hasOne(Cria::class, 'id');
    }
}
