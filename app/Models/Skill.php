<?php

namespace App\Models;

/**
 * @mixin IdeHelperSkill
 */
class Skill extends BaseModel
{
	public function skillType()
	{
		return $this->belongsTo(SkillType::class);
	}
}
