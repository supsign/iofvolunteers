<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperHostProjectOffer
 */
class HostProjectOffer extends BaseModel
{
    protected $table = 'host_project_offer';

    public function host(): BelongsTo
    {
        return $this->belongsTo(Host::class);
    }

    public function projectOffer(): BelongsTo
    {
        return $this->belongsTo(ProjectOffer::class);
    }
}
