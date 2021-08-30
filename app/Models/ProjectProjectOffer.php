<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperProjectProjectOffer
 */
class ProjectProjectOffer extends BaseModel
{
    protected $table = 'project_project_offer';

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function projectOffer(): BelongsTo
    {
        return $this->belongsTo(ProjectOffer::class);
    }
}
