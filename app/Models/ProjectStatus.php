<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperProjectStatus
 */
class ProjectStatus extends BaseModel
{
    protected $table = 'project_stati';

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
