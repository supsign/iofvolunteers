<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'name' => 'Florian', 'email' => 'florian@supsign.ch', 'password' => '$2y$10$e8Sf1lEeD1MKpj0naOX4/uN0uSUhH2gUohU7vUfLqU7NhHqx0qxxK'],
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

            DB::table('users')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
