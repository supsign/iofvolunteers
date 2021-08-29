<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectOfferSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'name' => 'International travel expenses'],
        ['id' => 2, 'name' => 'Domestic travel expenses'],
        ['id' => 3, 'name' => 'Accommodation'],
        ['id' => 4, 'name' => 'Meals'],
        ['id' => 5, 'name' => 'Pocket money'],
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

            DB::table('project_offers')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
