<?php

namespace App\Models;

/**
 * @mixin IdeHelperDutyModel
 */
class DutyModel extends BaseModel
{
    public function duty()
    {
        return $this->belongsTo(Duty::class);
    }

    public function dutyType()
    {
        return $this->belongsTo(DutyType::class);
    }
}
