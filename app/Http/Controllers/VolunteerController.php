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
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
    	if (!Auth::user()->volunteers()->count()) {
    		return $this->registerForm();
    	}

    	return view('volunteer.list', ['volunteers' => Auth::user()->volunteers]);
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

        foreach (['o_experience', 'o_work_expirence', 'continent', 'discipline', 'duty', 'language', 'skill'] as $key) {
            $$key = Helper::exractElementByKey($data, $key);
        }

        foreach ($o_experience AS $key => $value) {
        	$data[$key.'_experience_id'] = $value;
        }

        if (isset($o_work_expirence[1])) {
        	$data['o_work_expirence_local'] = $o_work_expirence[1];
        } 

        if (isset($o_work_expirence[2])) {
        	$data['o_work_expirence_international'] = $o_work_expirence[2];
        }

        $volunteer = Volunteer::create($data);
        Auth::user()->volunteers()->attach($volunteer->id);

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

        $volunteer->disciplines()->sync(array_keys($discipline));
        $volunteer->continents()->sync(array_keys($continent));
        $volunteer->skills()->sync(array_keys($skill));

        return;
    }


    public function search(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        // foreach (['minage', 'maxage', 'o_experience', 'language', 'other_languages', 'max_work_duration', 'skillType'] as $key) {
        //     $$key = Helper::exractElementByKey($data, $key);
        // }

        // $volunteer = Volunteer::where('')

        var_dump($data);


        return;
    }
}
