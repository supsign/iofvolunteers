<?php

namespace App\Models;

/**
 * @mixin IdeHelperProjectOffer
 */
class ProjectOffer extends BaseModel
{
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
