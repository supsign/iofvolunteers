<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRegister;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
	public function registerForm() 
	{
		return view('guest.register');
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
