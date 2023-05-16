<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperProjectVolunteer
 */
class ProjectVolunteer extends BaseModel
{
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function volunteer(): BelongsTo
    {
        return $this->belongsTo(Volunteer::class);
    }
}
