<?php

namespace App\Models;

/**
 * @mixin IdeHelperHost
 */
class Host extends BaseModel
{
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
}
