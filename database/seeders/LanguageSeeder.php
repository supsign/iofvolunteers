<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'name' => 'English'],
        ['id' => 2, 'name' => 'French'],
        ['id' => 3, 'name' => 'Spanish'],
        ['id' => 4, 'name' => 'German'],
        ['id' => 5, 'name' => 'Italian'],
        ['id' => 6, 'name' => 'Portuguese'],
        ['id' => 7, 'name' => 'Scandinavian'],
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

            DB::table('languages')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
