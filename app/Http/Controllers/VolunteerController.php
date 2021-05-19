<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Continent;
use App\Models\Discipline;
use App\Models\Duty;
use App\Models\DutyTypes;
use App\Models\Volunteer;
use App\Http\Requests\VolunteerRegister;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registerForm()
    {
        return view('volunteer.register', [
            'disciplines' => Discipline::all(),
            'continents' => Continent::all(),
            'dutyTypes' => DutyTypes::all(),
            'duties' => Duty::all()
        ]);
    }

    public function searchForm()
    {
        return view('volunteer.search');
    }

    public function register(VolunteerRegister $request)
    {
        $data = $request->all();

        unset($data['_token']);
        unset($data['agb']);

        foreach (['o_experience', 'continent', 'discipline', 'duty', 'language', 'skill'] as $key) {
            $$key = Helper::exractElementByKey($data, $key);
        }

        foreach ($o_experience AS $key => $value) {
        	$data[$key.'_experience_id'] = $value;
        }

        $volunteer = Volunteer::create($data);

        foreach ($language AS $key => $value) {
        	$volunteer->languages()->attach($key, ['language_proficiency_id' => $value]);
        }

        $volunteer->disciplines()->attach(array_keys($discipline));
        $volunteer->continents()->attach(array_keys($continent));
        $volunteer->skills()->attach(array_keys($skill));

        foreach ($duty AS $key => $values) {
        	$volunteer->duties()->attach(array_keys($values), ['duty_type_id' => $key]);
        }

        return $volunteer;
    }

    public function update(Volunteer $volunteer, VolunteerRegister $request)
    {
        die();

        return;
    }


    public function search()
    {
    	
    }
}
