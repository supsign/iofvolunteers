<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DutySeeder extends Seeder
{
    private $data = [
		['id' => 1, 'name' => 'Event Director'],
		['id' => 2, 'name' => 'Mapper'],
        ['id' => 3, 'name' => 'Course Planner'],
		['id' => 4, 'name' => 'IT Director'],
		['id' => 5, 'name' => 'Event Advisor'],
		['id' => 6, 'name' => 'Jury Member'],
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $entry) {
        	$data = array();

        	foreach ($entry AS $key => $value) {
                if ($key === 'id') {
                    continue;
                }

        		$data[$key] = $value;
        	}

            DB::table('duties')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
