<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    // Relacion de cardinalidad 
    public function tickets() {
        return $this->belongsToMany(Tickets::class);
    }
}
