<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin IdeHelperGuest
 */
class Guest extends BaseModel
{
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function languages(): MorphToMany
    {
        return $this->morphToMany(Language::class, 'language_model');
    }
}
