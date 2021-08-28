<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperLanguageModel
 */
class LanguageModel extends BaseModel
{
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function languageProficiency(): BelongsTo
    {
        return $this->belongsTo(LanguageProficiency::class);
    }

    public function getLanguageNameAttribute(): string
    {
        return $this->language->name;
    }

    public function getLanguageProficiencyNameAttribute(): string
    {
        return $this->languageProficiency->name;
    }
}
