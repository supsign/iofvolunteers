<?php

namespace App\Models;

/**
 * @mixin IdeHelperLanguage
 */
class Language extends BaseModel
{
    public function volunteers()
    {
        return $this->morphedByMany(Volunteer::class, 'language_model');
    }
}
