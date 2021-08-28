<?php

namespace App\Models;

/**
 * @mixin IdeHelperProjectStatus
 */
class ProjectStatus extends BaseModel
{
    protected $table = 'project_stati';

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
