<?php

namespace App\Models;

class Volunteer extends BaseModel
{
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function disciplines()
    {
        return $this->morphToMany(Discipline::class, 'discipline_model');
    }

    public function duties()
    {
        return $this->morphToMany(Duty::class, 'duty_model');
    }

    public function continents()
    {
        return $this->morphToMany(Continent::class, 'continent_model');
    }

    public function languages()
    {
        return $this->morphToMany(Language::class, 'language_model');
    }

    public function languageModels()
    {
    	return $this
    		->hasMany(LanguageModel::class, 'language_model_id')
    		->where('language_model_type', self::class)
    		->with('language')
    		->with('languageProficiency');
    }

    public function languageProficiencies()
    {
        return $this->morphToMany(LanguageProficiency::class, 'language_model');
    }

    public function skills()
    {
        return $this->morphToMany(Skill::class, 'skill_model');
    }

    public function getLanguageInfoAttribute()
    {
    	$res = [];

        foreach ($this->languageModels AS $languageModel) {
        	$res[$languageModel->languageName] = $languageModel->languageProficiencyName;
        }

        return $res;
    }
}
