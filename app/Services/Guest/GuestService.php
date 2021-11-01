<?php

namespace App\Services\Guest;

use App\Models\Guest;

class GuestService
{
    public function delete(Guest $guest)
    {
        $user = $guest->user;

        if ($user) {
            $user->guest()->disassociate($guest);
            $user->save();
            $guest->delete();
        }
    }
}
