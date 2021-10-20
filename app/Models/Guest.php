<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperGuest
 */
class Guest extends BaseModel
{
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
