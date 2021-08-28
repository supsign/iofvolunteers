<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin IdeHelperContinent
 */
class Continent extends BaseModel
{
    public function volunteers(): MorphToMany
    {
        return $this->morphedByMany(Volunteer::class, 'continent_model');
    }
}
