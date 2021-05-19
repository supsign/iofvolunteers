<?php

namespace App\Models;

class Project extends BaseModel
{
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
}
