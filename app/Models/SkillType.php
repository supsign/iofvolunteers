<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperSkillType
 */
class SkillType extends BaseModel
{
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

	public function getSnakeCaseNameAttribute(): string | array
    {
    	$name = parent::getSnakeCaseNameAttribute();

    	switch ($name) {
    		case 'it_&_time-keeping':   return 'it';
    		case 'teaching_experience': return 'teaching';
    		default: return $name;
    	}
    }
}
