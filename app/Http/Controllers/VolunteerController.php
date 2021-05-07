<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\VolunteerRegister;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
	public function registerForm() 
	{
		return view('volunteer.register', ['countries' => Country::all()]);
	}

	public function searchForm() 
	{
		return view('volunteer.search');
	}

	public function register(VolunteerRegister $request) 
	{

	}

	public function search() 
	{

	}
}
