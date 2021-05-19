<?php

namespace App\Models;

class Discipline extends BaseModel
{
    public function volunteers()
    {
        return $this->morphedByMany(Volunteer::class, 'discipline_model');
    }
}
