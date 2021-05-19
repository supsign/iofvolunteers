<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContinentSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'name' => 'North America'],
        ['id' => 2, 'name' => 'South America'],
		['id' => 3, 'name' => 'Europe'],
        ['id' => 4, 'name' => 'Asia'],
		['id' => 5, 'name' => 'Africa'],
		['id' => 6, 'name' => 'Oceania'],
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

            DB::table('continents')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
