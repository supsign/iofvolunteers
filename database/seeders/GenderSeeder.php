<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;


class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('genders')->updateOrInsert(
            ['id' => '1'],
            ['name' => 'male', 'salutation' => 'sir', 'short_name' => 'M']
        );

        DB::table('genders')->updateOrInsert(
            ['id' => '2'],
            ['name' => 'female', 'salutation' => 'madam', 'short_name' => 'F']
        );
    }
}
