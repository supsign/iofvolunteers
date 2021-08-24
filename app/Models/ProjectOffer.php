<?php

namespace App\Models;

class ProjectOffer extends BaseModel
{
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
