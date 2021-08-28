<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin IdeHelperLanguage
 */
class Language extends BaseModel
{
    public function volunteers(): MorphToMany
    {
        return $this->morphedByMany(Volunteer::class, 'language_model');
    }
}
