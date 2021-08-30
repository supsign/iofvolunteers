<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin IdeHelperProject
 */
class Project extends BaseModel
{
    public function disciplines(): MorphToMany
    {
        return $this->morphToMany(Discipline::class, 'discipline_model');
    }

    public function duties(): MorphToMany
    {
        return $this->morphToMany(Duty::class, 'duty_model');
    }

    public function projectOffer(): BelongsToMany
    {
        return $this->belongsToMany(ProjectOffer::class);
    }

    public function projectStatus(): BelongsTo
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    public function skills(): MorphToMany
    {
        return $this->morphToMany(Skill::class, 'skill_model');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
