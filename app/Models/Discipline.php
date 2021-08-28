<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin IdeHelperDiscipline
 */
class Discipline extends BaseModel
{
    public function volunteers(): MorphToMany
    {
        return $this->morphedByMany(Volunteer::class, 'discipline_model');
    }
}
