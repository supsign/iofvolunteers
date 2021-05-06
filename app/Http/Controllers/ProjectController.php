<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\ProjectRegister;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
	public function registerForm() 
	{
		return view('guest.register', ['countries' => Country::all()]);
	}

	public function searchForm() 
	{
		return view('guest.search');
	}

	public function register(ProjectRegister $request) 
	{

	}

	public function search() 
	{

	}
}
