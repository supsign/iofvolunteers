<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin IdeHelperGuest
 */
class Guest extends BaseModel
{
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
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

    public function languageGuests(): HasMany
    {
        return $this
            ->hasMany(LanguageModel::class, 'language_model_id')
            ->where('language_model_type', self::class)
            ->with('language')
            ->with('languageProficiency');
    }

    public function getDrivingLicenceModelAttribute()
    {
        $model = new BaseModel;
        $model->id = $this->driving_licence;

        return $model;
    }

    public function disciplines(): MorphToMany
    {
        return $this->morphToMany(Discipline::class, 'discipline_model');
    }

    public function newCollection(array $models = []): GuestCollection
    {
        return new GuestCollection($models);
    }
}
