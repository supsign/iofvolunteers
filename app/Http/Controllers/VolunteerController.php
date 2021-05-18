<?php

namespace App\Http\Controllers;

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
		var_dump(
			$request->all()
		);

		die();

		return Volunteer::create($request->validated());
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
