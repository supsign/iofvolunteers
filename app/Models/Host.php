<?php

namespace App\Models;

class Host extends BaseModel
{
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
}
