<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class ProjectCollection extends Collection
{
    public function filterByContinents($continentArray): ProjectCollection
    {
        return $this->filter(function ($project) use ($continentArray) {
            foreach (array_keys(array_filter($continentArray)) as $continent) {
                echo $continent;
                if (!$project->continents->contains('id', $continent)) {
                    return false;
                }
            }

            return true;
        });
    }

    public function filterByOffers($offerArray): ProjectCollection
    {
        return $this->filter(function ($project) use ($offerArray) {
            foreach (array_keys(array_filter($offerArray)) as $offer) {
                if (!$project->projectOffers->contains('id', $offer)) {
                    return false;
                }
            }

            return true;
        });
    }

    public function filterByDisciplines($disciplinesArray): ProjectCollection
    {
        return $this->filter(function ($project) use ($disciplinesArray) {
            foreach (array_keys(array_filter($disciplinesArray)) as $discipline) {
                if (!$project->disciplines->contains('id', $discipline)) {
                    return false;
                }
            }

            return true;
        });
    }

    public function filterBySkillType($skillTypeArray): ProjectCollection
    {
        return $this->filter(function ($project) use ($skillTypeArray) {
            foreach (array_keys(array_filter($skillTypeArray)) as $skillType) {
                if (!$project->skillTypes->contains('id', $skillType)) {
                    return false;
                }
            }

            return true;
        });
    }
}
