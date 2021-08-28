<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class ExperienceCollection extends Collection
{
	public function local(): ExperienceCollection
    {
		return $this->filter(function($experience) {
			return $experience->local;
		});
	}

	public function national(): ExperienceCollection
    {
		return $this->filter(function($experience) {
			return $experience->national;
		});
	}

	public function international(): ExperienceCollection
    {
		return $this->filter(function($experience) {
			return $experience->international;
		});
	}
}
