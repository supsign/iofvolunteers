<?php

namespace App\Models;

/**
 * @mixin IdeHelperContinent
 */
class Continent extends BaseModel
{
    public function volunteers()
    {
        return $this->morphedByMany(Volunteer::class, 'continent_model');
    }
}
