<?php

namespace App\Models;

/**
 * @mixin IdeHelperDiscipline
 */
class Discipline extends BaseModel
{
    public function volunteers()
    {
        return $this->morphedByMany(Volunteer::class, 'discipline_model');
    }
}
