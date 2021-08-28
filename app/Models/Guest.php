<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperGuest
 */
class Guest extends BaseModel
{
    public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class);
    }
}
