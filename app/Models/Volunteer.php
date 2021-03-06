<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperVolunteer
 */
class Volunteer extends BaseModel implements HasMedia
{
    use InteractsWithMedia;

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function disciplines(): MorphToMany
    {
        return $this->morphToMany(Discipline::class, 'discipline_model');
    }

    public function duties(): MorphToMany
    {
        return $this->morphToMany(Duty::class, 'duty_model');
    }

    public function dutyVolunteer(): HasMany
    {
        return $this
            ->hasMany(DutyModel::class, 'duty_model_id')
            ->where('duty_model_type', self::class);
    }

    public function continents(): MorphToMany
    {
        return $this->morphToMany(Continent::class, 'continent_model');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function languages(): MorphToMany
    {
        return $this->morphToMany(Language::class, 'language_model');
    }

    public function languageVolunteers(): HasMany
    {
        return $this
            ->hasMany(LanguageModel::class, 'language_model_id')
            ->where('language_model_type', self::class)
            ->with('language')
            ->with('languageProficiency');
    }

    public function languageProficiencies(): MorphToMany
    {
        return $this->morphToMany(LanguageProficiency::class, 'language_model');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    public function skills(): MorphToMany
    {
        return $this->morphToMany(Skill::class, 'skill_model');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('map_sample')->singleFile();
    }

    public function newCollection(array $models = []): VolunteerCollection
    {
        return new VolunteerCollection($models);
    }

    public function getAgeAttribute(): int
    {
        return Carbon::parse($this->birthdate)->age;
    }

    public function getDrivingLicenceModelAttribute()
    {
        $model = new BaseModel;
        $model->id = $this->driving_licence;

        return $model;
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
        return $this->dutyVolunteer->contains(
            function ($dutyVolunteer) use ($duty, $dutyType) {
                return $duty->id === $dutyVolunteer->duty_id && $dutyType->id === $dutyVolunteer->duty_type_id;
            }
        );
    }
}
