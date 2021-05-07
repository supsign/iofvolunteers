<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Project;
use App\Http\Requests\ProjectRegister;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
	public function registerForm() 
	{
		return view('project.register', ['countries' => Country::all()]);
	}

	public function searchForm() 
	{
		return view('project.search');
	}

	public function register(ProjectRegister $request) 
	{
		die();

		return Project::create($request->validated());
	}

	public function update(Project $project, ProjectRegister $request) 
	{
		die();

		return Project::update($request->validated());
	}

	public function search() 
	{

	}
}
