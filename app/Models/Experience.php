<?php

namespace App\Models;

/**
 * @mixin IdeHelperExperience
 */
class Experience extends BaseModel
{
    public function newCollection(array $models = []): ExperienceCollection
    {
        return new ExperienceCollection($models);
    }
}
