<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillTypeSeeder extends Seeder
{
    private $data = [
		['id' => 1, 'name' => 'Mapping'],
		['id' => 2, 'name' => 'Coaching'],
		['id' => 3, 'name' => 'IT & time-keeping'],
		['id' => 4, 'name' => 'Event Organising'],
		['id' => 5, 'name' => 'Teaching experience'],
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

            DB::table('skill_types')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
