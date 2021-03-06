<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillTypeSeeder extends Seeder
{
    private $data = [
        [
            'id' => 2,
            'name' => 'Mapping',
            'text' => 'Brief outline of your experience as a mapper',
            'warn' => 'Notice that you will be required to upload map samples!',
            'vol_col_name' => 'skill_mapping',
        ],
        ['id' => 3, 'name' => 'Coaching', 'text' => 'Brief outline of your experience in coaching',  'vol_col_name' => 'skill_coaching'],
        ['id' => 5, 'name' => 'IT & time-keeping', 'text' => 'Brief details of your IT skills & experience',  'vol_col_name' => 'skill_it'],
        ['id' => 4, 'name' => 'Event Organising', 'text' => 'Brief outline of your experience as organiser',  'vol_col_name' => 'skill_event_organising'],
        ['id' => 1, 'name' => 'Teaching experience', 'text' => 'Brief outline of your experience in teaching',  'vol_col_name' => 'skill_teaching'],
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

            DB::table('skill_types')->updateOrInsert(['id' => $entry['id']], $data);
        }
    }
}
