<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticated;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticated implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function host(): belongsTo
    {
        return $this->belongsTo(Host::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function volunteer(): BelongsTo
    {
        return $this->belongsTo(Volunteer::class);
    }
}
