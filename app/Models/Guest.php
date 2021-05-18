<?php

namespace App\Models;

class Guest extends BaseModel
{
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
}
