<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function dutyProject(): HasMany
    {
        return $this
            ->hasMany(DutyModel::class, 'duty_model_id')
            ->where('duty_model_type', self::class);
    }

    public function continent(): BelongsTo
    {
        return $this->BelongsTo(Continent::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function projectOffers(): BelongsToMany
    {
        return $this->belongsToMany(ProjectOffer::class);
    }

    public function projectProjectOffers(): HasMany
    {
        return $this->hasMany(ProjectProjectOffer::class);
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

    public function newCollection(array $models = []): ProjectCollection
    {
        return new ProjectCollection($models);
    }

    public function getSkillTypesAttribute()
    {
        $skillTypes = collect();

        foreach ($this->skills as $skill) {
            $skillTypes->push($skill->skillType);
        }

        return $skillTypes->unique();
    }

    public function hasDuty(Duty $duty, DutyType $dutyType): bool
    {
        return $this->dutyProject->contains(
            function ($dutyProject) use ($duty, $dutyType) {
                return $duty->id === $dutyProject->duty_id && $dutyType->id === $dutyProject->duty_type_id;
            }
        );
    }
}
