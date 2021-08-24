<?php

namespace App\Models;

use Carbon\Carbon;

class Volunteer extends BaseModel
{
    public function user()
    {
        return $this->hasOne(User::class);
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

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function languages()
    {
        return $this->morphToMany(Language::class, 'language_model');
    }

    public function languageVolunteers()
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

    public function newCollection(array $models = [])
    {
        return new VolunteerCollection($models);
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthdate)->age;
    }

    public function getDrivingLicenceModelAttribute()
    {
        $model = new BaseModel;
        $model->id = $this->driving_licence;

        return $model;
    }

    public function getLanguageInfoAttribute()
    {
        $res = [];

        foreach ($this->languageModels as $languageModel) {
            $res[$languageModel->languageName] = $languageModel->languageProficiencyName;
        }

        return $res;
    }

    public function getSkillTypesAttribute()
    {
        $skillTypes = collect();

        foreach ($this->skills as $skill) {
            $skillTypes->push($skill->skillType);
        }

        return $skillTypes;
    }
}
