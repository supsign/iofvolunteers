<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    private $data = [
		['id' => 1, 'name' => 'Sprint', 'skill_type_id' => 2],
		['id' => 2, 'name' => 'Forest', 'skill_type_id' => 2],
		['id' => 3, 'name' => 'MTBO', 'skill_type_id' => 2],
		['id' => 4, 'name' => 'SkiO', 'skill_type_id' => 2],
		['id' => 5, 'name' => 'National Team', 'skill_type_id' => 3],
		['id' => 6, 'name' => 'Clubs', 'skill_type_id' => 3],
		['id' => 7, 'name' => 'SportIdent', 'skill_type_id' => 5],
		['id' => 8, 'name' => 'Emit', 'skill_type_id' => 5],
		['id' => 9, 'name' => 'Other Timekeeping', 'skill_type_id' => 5],
		['id' => 10, 'name' => 'GPS Tracking', 'skill_type_id' => 5],
		['id' => 11, 'name' => 'Club', 'skill_type_id' => 4],
		['id' => 12, 'name' => 'Local', 'skill_type_id' => 4],
		['id' => 13, 'name' => 'National', 'skill_type_id' => 4],
		['id' => 14, 'name' => 'High-Level', 'skill_type_id' => 4],
		['id' => 15, 'name' => 'Beginners & children', 'skill_type_id' => 1],
		['id' => 16, 'name' => 'How to map', 'skill_type_id' => 1],
		['id' => 17, 'name' => 'Coaching', 'skill_type_id' => 1],
		['id' => 18, 'name' => 'IT & Timekeeping', 'skill_type_id' => 1],
		['id' => 19, 'name' => 'Event Organising', 'skill_type_id' => 1],
		['id' => 20, 'name' => 'Development of Educational Material', 'skill_type_id' => 1],
		['id' => 21, 'name' => 'Course planning', 'skill_type_id' => 1],
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

            DB::table('skills')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
