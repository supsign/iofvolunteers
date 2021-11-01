<?php

namespace App\Services\Volunteer;

use App\Models\Volunteer;

class VolunteerService
{
    public function delete(Volunteer $volunteer)
    {
        $user = $volunteer->user;

        if ($user) {
            $user->volunteer()->disassociate($volunteer);
            $user->save();
            $volunteer->delete();
        }
    }
}
