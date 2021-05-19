<?php

namespace App\Models;

class Experience extends BaseModel
{
    public function newCollection(array $models = [])
    {
        return new ExperienceCollection($models);
    }
}
