<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Volunteer;
use App\Services\Volunteer\VolunteerService;
use Tests\TestCase;

class VolunteerServiceTest extends TestCase
{
    protected VolunteerService $volunteerService;

    protected function setUp():void
    {
        parent::setUp();
        $this->volunteerService = $this->app->make(VolunteerService::class);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_deleteVolunteer()
    {
        $user = User::factory()->create();
        $volunteer = Volunteer::factory()->create();

        $user->volunteer()->associate($volunteer);
        $user->save();

        $this->assertEquals($volunteer->id, $user->volunteer_id);

        $this->volunteerService->delete($volunteer);


        $this->assertDatabaseMissing($volunteer, [
            'id' => $volunteer->id,
        ]);

        $user->refresh();

        $this->assertNull($user->volunteer_id);
        $this->assertNull($user->volunteer);
    }
}
