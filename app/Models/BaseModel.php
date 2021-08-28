<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperBaseModel
 */
class BaseModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getSnakeCaseNameAttribute()
    {
    	return str_replace([' ', '/'], ['_', ''], strtolower($this->name));
    }
}
