<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Continent;
use App\Models\Discipline;
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
			'continents' => Continent::all()
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

		foreach (['o_experience', 'continent', 'discipline', 'language', 'skill'] AS $key) {
			$$key = Helper::exractElementByKey($data, $key);
		}

		unset($data['mappingDesc']);
		unset($data['coachDesc']);
		unset($data['itDesc']);
		unset($data['eventDesc']);
		unset($data['teacherDesc']);
		unset($data['oworkLocalExp']);
		unset($data['oworkInternationalExp']);

		var_dump($data);

		// var_dump(
		// 	$data
		// );

		// die();

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
