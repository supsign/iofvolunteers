<?php

namespace App\Models;

/**
 * @mixin IdeHelperProject
 */
class Project extends BaseModel
{
    public function disciplines()
    {
        return $this->morphToMany(Discipline::class, 'discipline_model');
    }

    public function duties()
    {
        return $this->morphToMany(Duty::class, 'duty_model');
    }

    public function projectOffer()
    {
        return $this->belongsToMany(ProjectOffer::class);
    }

    public function projectStatus()
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    public function skills()
    {
        return $this->morphToMany(Skill::class, 'skill_model');
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
