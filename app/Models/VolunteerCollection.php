<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class VolunteerCollection extends Collection
{
    public function filterByLanguages($languageArray): VolunteerCollection
    {
        return $this->filter(function ($volunteer) use ($languageArray) {
            foreach ($volunteer->languageVolunteers as $languageVolunteer) {
                if ($languageVolunteer->language_proficiency_id > $languageArray[$languageVolunteer->language_id]) {
                    return false;
                }
            }

            return true;
        });
    }

    public function filterByDisciplines($disciplinesArray): VolunteerCollection
    {
        return $this->filter(function ($volunteer) use ($disciplinesArray) {
            foreach (array_keys(array_filter($disciplinesArray)) as $discipline) {
                if (! $volunteer->disciplines->contains('id', $discipline)) {
                    return false;
                }
            }

            return true;
        });
    }

    public function filterBySkillType($skillTypeArray): VolunteerCollection
    {
        return $this->filter(function ($volunteer) use ($skillTypeArray) {
            foreach (array_keys(array_filter($skillTypeArray)) as $skillType) {
                if (! $volunteer->skillTypes->contains('id', $skillType)) {
                    return false;
                }
            }

            return true;
        });
    }
}
