<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DutyTypeSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'name' => 'Local / National Events (number)'],
        ['id' => 2, 'name' => 'International Events (number)'],
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

            DB::table('duty_types')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
