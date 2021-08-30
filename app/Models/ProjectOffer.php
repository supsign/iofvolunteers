<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperProjectOffer
 */
class ProjectOffer extends BaseModel
{
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }
}
