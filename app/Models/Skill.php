<?php

namespace App\Models;

class Skill extends BaseModel
{
	public function skillType()
	{
		return $this->belongsTo(SkillType::class);
	}
}
