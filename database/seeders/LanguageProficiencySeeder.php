<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageProficiencySeeder extends Seeder
{
    private $data = [
		['id' => 1, 'name' => 'Excellent'],
		['id' => 2, 'name' => 'Ok'],
		['id' => 3, 'name' => 'Poor'],
        ['id' => 4, 'name'  => 'none']
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

            DB::table('language_proficiencies')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
