<?php

namespace App\Models;

class Project extends BaseModel
{
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function projectOffer()
    {
        return $this->belongsToMany(ProjectOffer::class);
    }

    public function projectStatus()
    {
        return $this->belongsTo(ProjectStatus::class);
    }
}
