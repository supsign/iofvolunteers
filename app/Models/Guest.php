<?php

namespace App\Models;

/**
 * @mixin IdeHelperGuest
 */
class Guest extends BaseModel
{
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
}
