<?php

namespace App\Models;

class Language extends BaseModel
{
    public function volunteers()
    {
        return $this->morphedByMany(Volunteer::class, 'language_model');
    }
}
