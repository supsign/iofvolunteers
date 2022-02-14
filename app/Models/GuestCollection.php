<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class GuestCollection extends Collection
{
    public function filterByLanguages($languageArray): self
    {
        return $this->filter(function ($guest) use ($languageArray) {
            foreach ($guest->languageGuests as $languageGuest) {
                if ($languageGuest->language_proficiency_id > $languageArray[$languageGuest->language_id]) {
                    return false;
                }
            }

            return true;
        });
    }

    public function filterByDisciplines($disciplinesArray): self
    {
        return $this->filter(function ($guest) use ($disciplinesArray) {
            foreach (array_keys(array_filter($disciplinesArray)) as $discipline) {
                if (! $guest->disciplines->contains('id', $discipline)) {
                    return false;
                }
            }

            return true;
        });
    }
}
