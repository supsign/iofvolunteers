<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class ProjectCollection extends Collection
{
    public function filterByContinents($continentArray): self
    {
        return $this->filter(function ($project) use ($continentArray) {
            $continentArray = array_filter($continentArray);
            if (empty($continentArray)) {
                return true;
            }
            foreach (array_keys($continentArray) as $continent) {
                if ($project->continent_id === $continent) {
                    return true;
                }
            }

            return false;
        });
    }

    public function filterByProjectOffers($offerArray): self
    {
        return $this->filter(function ($project) use ($offerArray) {
            foreach (array_keys(array_filter($offerArray)) as $offer) {
                if (! $project->projectOffers->contains('id', $offer)) {
                    return false;
                }
            }

            return true;
        });
    }

    public function filterByDisciplines($disciplinesArray): self
    {
        return $this->filter(function ($project) use ($disciplinesArray) {
            foreach (array_keys(array_filter($disciplinesArray)) as $discipline) {
                if (! $project->disciplines->contains('id', $discipline)) {
                    return false;
                }
            }

            return true;
        });
    }

    public function filterBySkillType($skillTypeArray): self
    {
        return $this->filter(function ($project) use ($skillTypeArray) {
            foreach (array_keys(array_filter($skillTypeArray)) as $skillType) {
                if (! $project->skillTypes->contains('id', $skillType)) {
                    return false;
                }
            }

            return true;
        });
    }
}
