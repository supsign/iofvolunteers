<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'name' => 'Federation'],
        ['id' => 2, 'name' => 'Club'],
        ['id' => 3, 'name' => 'Informal Group'],
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

            DB::table('project_stati')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
