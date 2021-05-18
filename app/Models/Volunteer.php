<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    public function user() 
    {
    	return $this->belongsTo(User::class);
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

    public function getLanguageInfoAttribute()
    {
    	$res = [];

        foreach ($this->languageModels AS $languageModel) {
        	$res[$languageModel->languageName] = $languageModel->languageProficiencyName;
        }

        return $res;
    }
}
