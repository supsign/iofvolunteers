<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class HostCollection extends Collection
{
    public function filterByLanguages($languageArray): HostCollection
    {
        return $this->filter(function ($host) use ($languageArray) {
            foreach ($host->languageHosts as $languageHost) {
                if ($languageHost->language_proficiency_id > $languageArray[$languageHost->language_id]) {
                    return false;
                }
            }

            return true;
        });
    }

    public function filterByContinents($continentArray): HostCollection
    {
        return $this->filter(function ($host) use ($continentArray) {
            $continentArray = array_filter($continentArray);
            if (empty($continentArray)) {
                return true;
            }
            
            foreach (array_keys($continentArray) as $continent) {
                if ($host->country->continent_id === $continent) {
                    return true;
                }
            }

            return false;
        });
    }

    public function filterByProjectOffers($offerArray): HostCollection
    {
        return $this->filter(function ($host) use ($offerArray) {
            foreach (array_keys(array_filter($offerArray)) as $offer) {
                if (!$host->projectOffers->contains('id', $offer)) {
                    return false;
                }
            }

            return true;
        });
    }
}
