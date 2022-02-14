<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class ExperienceCollection extends Collection
{
    public function local(): self
    {
        return $this->filter(function ($experience) {
            return $experience->local;
        });
    }

    public function national(): self
    {
        return $this->filter(function ($experience) {
            return $experience->national;
        });
    }

    public function international(): self
    {
        return $this->filter(function ($experience) {
            return $experience->international;
        });
    }
}
