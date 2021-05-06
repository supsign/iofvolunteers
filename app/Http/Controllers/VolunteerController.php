<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolunteerRegister;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
	public function registerForm() 
	{
		return view('guest.register');
	}

	public function searchForm() 
	{
		return view('guest.search');
	}

	public function register(VolunteerRegister $request) 
	{

	}

	public function search() 
	{

	}
}
