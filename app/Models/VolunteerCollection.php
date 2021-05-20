<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class VolunteerCollection extends Collection
{
	public function filterByLanguages($languageArray)
	{
		return $this->filter(function($volunteer) use ($languageArray) {
			var_dump(
				$languageArray,
			);

			foreach ($volunteer->languageVolunteers AS $languageVolunteer) {
				if ($languageVolunteer->language_proficiency_id > $languageArray[$languageVolunteer->language_id]) {
					return false;
				}
			}

			return true;
		});
	}
}
