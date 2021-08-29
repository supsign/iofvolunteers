<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'value' => 'none', 'local' => true, 'national' => true, 'international' => true],
        ['id' => 2, 'value' => '1 - 20', 'local' => false, 'national' => false, 'international' => true],
        ['id' => 3, 'value' => '21 - 50', 'local' => false, 'national' => false, 'international' => true],
        ['id' => 4, 'value' => 'over 50', 'local' => false, 'national' => false, 'international' => true],
        ['id' => 5, 'value' => '1 - 50', 'local' => true, 'national' => true, 'international' => false],
        ['id' => 6, 'value' => '51 - 100', 'local' => true, 'national' => true, 'international' => false],
        ['id' => 7, 'value' => 'over 100', 'local' => true, 'national' => true, 'international' => false],
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

            DB::table('experiences')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
