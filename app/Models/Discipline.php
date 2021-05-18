<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    public function volunteers()
    {
        return $this->morphedByMany(Volunteer::class, 'discipline_model');
    }
}
