<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperDutyModel
 */
class DutyModel extends BaseModel
{
    public function duty(): BelongsTo
    {
        return $this->belongsTo(Duty::class);
    }

    public function dutyType(): BelongsTo
    {
        return $this->belongsTo(DutyType::class);
    }
}
