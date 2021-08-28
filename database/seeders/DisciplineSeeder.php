<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplineSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'name' => 'Foot-O'],
        ['id' => 2, 'name' => 'MTBO'],
        ['id' => 3, 'name' => 'Ski-O'],
        ['id' => 4, 'name' => 'Trail-O'],
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

            foreach ($entry as $key => $value) {
                if ($key === 'id') {
                    continue;
                }

                $data[$key] = $value;
            }

            DB::table('disciplines')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
