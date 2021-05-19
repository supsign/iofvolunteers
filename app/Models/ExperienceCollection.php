<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class ExperienceCollection extends Collection
{
	public function local()
	{
		return $this->filter(function($experience) {
			return $experience->local;
		});
	}

	public function national()
	{
		return $this->filter(function($experience) {
			return $experience->national;
		});
	}

	public function international()
	{
		return $this->filter(function($experience) {
			return $experience->international;
		});
	}
}
