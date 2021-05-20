<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class VolunteerCollection extends Collection
{
	public function filterByLanguages($languageArray)
	{
		return $this->filter(function($volunteer) use ($languageArray) {
			foreach ($volunteer->languageVolunteers AS $languageVolunteer) {
				if ($languageVolunteer->language_proficiency_id > $languageArray[$languageVolunteer->language_id]) {
					return false;
				}
			}

			return true;
		});
	}

	public function filterByDisciplines($disciplinesArray)
	{
		return $this->filter(function($volunteer) use ($disciplinesArray) {
			foreach (array_keys($disciplinesArray) AS $discipline) {
				if (!$volunteer->disciplines->contains('id', $discipline)) {
					return false;
				}
			}

			return true;
		});
	}

	public function filterBySkillType($skillTypeArray)
	{
		return $this->filter(function($volunteer) use ($skillTypeArray) {
			foreach (array_keys($skillTypeArray) AS $skillType) {
				if (!$volunteer->skillTypes->contains('id', $skillType)) {
					return false;
				}
			}

			return true;
		});
	}
}
