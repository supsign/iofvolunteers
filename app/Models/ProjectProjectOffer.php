<?php

namespace App\Models;

class ProjectProjectOffer extends Model
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
