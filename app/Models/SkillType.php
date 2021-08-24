<?php

namespace App\Models;

class SkillType extends BaseModel
{
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

	public function getSnakeCaseNameAttribute()
    {
    	$name = parent::getSnakeCaseNameAttribute();

    	switch ($name) {
    		case 'it_&_time-keeping':   return 'it';
    		case 'teaching_experience': return 'teaching';
    		default: return $name;
    	}
    }
}
