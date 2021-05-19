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

        // unset($data['birthdate']);		//	format doesn't match

        foreach (['o_experience', 'continent', 'discipline', 'duty', 'language', 'skill'] as $key) {
            $$key = Helper::exractElementByKey($data, $key);
        }

        return Volunteer::create($data);
    }

    public function update(Volunteer $volunteer, VolunteerRegister $request)
    {
        die();

        return Volunteer::update($request->validated());
    }


    public function search()
    {
    }
}
