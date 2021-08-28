<?php

namespace App\Models;

/**
 * @mixin IdeHelperProjectProjectOffer
 */
class ProjectProjectOffer extends BaseModel
{
    protected $table = 'project_project_offer';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function projectOffer()
    {
        return $this->belongsTo(ProjectOffer::class);
    }
}
