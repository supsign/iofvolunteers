<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContinentSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'name' => 'Europe'],
        ['id' => 3, 'name' => 'Africa'],
        ['id' => 4, 'name' => 'Oceania'],
        ['id' => 5, 'name' => 'North America'],
        ['id' => 6, 'name' => 'Asia'],
        ['id' => 7, 'name' => 'South America'],
        ['id' => 8, 'name' => 'Central America / Caribbean'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $entry) {
            $data = [];

            foreach ($entry as $key => $value) {
                if ($key === 'id') {
                    continue;
                }

                $data[$key] = $value;
            }

            DB::table('continents')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
