<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin IdeHelperHost
 */
class Host extends BaseModel
{
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function projectOffers(): BelongsToMany
    {
        return $this->belongsToMany(ProjectOffer::class);
    }

    public function hostProjectOffers(): HasMany
    {
        return $this->hasMany(HostProjectOffer::class);
    }

    public function languages(): MorphToMany
    {
        return $this->morphToMany(Language::class, 'language_model');
    }

    public function languageHosts(): HasMany
    {
        return $this
            ->hasMany(LanguageModel::class, 'language_model_id')
            ->where('language_model_type', self::class)
            ->with('language')
            ->with('languageProficiency');
    }
}
