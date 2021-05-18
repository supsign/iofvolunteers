<?php

namespace App\Models;

class LanguageModel extends BaseModel
{
    public function language()
    {
    	return $this->belongsTo(Language::class);
    }

    public function languageProficiency()
    {
    	return $this->belongsTo(LanguageProficiency::class);
    }

    public function getLanguageNameAttribute()
    {
    	return $this->language->name;
    }

    public function getLanguageProficiencyNameAttribute()
    {
    	return $this->languageProficiency->name;
    }
}
