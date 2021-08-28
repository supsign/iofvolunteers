<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperSkill
 */
class Skill extends BaseModel
{
	public function skillType(): BelongsTo
    {
		return $this->belongsTo(SkillType::class);
	}
}
