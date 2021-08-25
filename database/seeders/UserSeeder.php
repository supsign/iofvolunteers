<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    private $data = [
        ['id' => 1, 'firstname' => 'Florian', 'lastname' => 'Ratz', 'email' => 'florian.ratz@supsign.ch', 'email_verified_at' => null, 'password' => '$2y$10$e8Sf1lEeD1MKpj0naOX4/uN0uSUhH2gUohU7vUfLqU7NhHqx0qxxK']
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
                switch ($key) {
                    case 'id': continue 2;
                    case 'email_verified_at': $data[$key] = now(); break;
                    default: $data[$key] = $value; break;
                }
            }

            DB::table('users')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
