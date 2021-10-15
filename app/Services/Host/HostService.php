<?php

namespace App\Services\Host;

use App\Models\Host;

class HostService
{
    public function delete(Host $host)
    {
        $host->hostProjectOffers()->delete();

        $user = $host->user;
        if ($user) {
            $user->host()->disassociate($host);
            $user->save();
        }

        $host->delete();
    }
}
