<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Project;
use App\Http\Requests\Project\Register;
use App\Http\Requests\Project\Update;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
	
	public function registerForm() 
	{
		return view('project.register', ['countries' => Country::all()]);
	}

	public function searchForm() 
	{
		return view('project.search');
	}

	public function register(Register $request) 
	{
		var_dump($request->all());

		die();

		// return Project::create($request->validated());
	}

	public function update(Project $project, Update $request)
	{
		var_dump($request->all());

		die();

		// return Project::update($request->validated());
	}

	public function search() 
	{

	}
}
