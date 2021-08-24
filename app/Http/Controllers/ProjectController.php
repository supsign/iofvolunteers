<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Project;
use App\Http\Requests\Project\Register;
use App\Http\Requests\Project\Update;
use App\Models\Continent;
use App\Models\Discipline;
use App\Models\Duty;
use App\Models\DutyType;
use App\Models\Gender;
use App\Models\LanguageProficiency;
use App\Models\SkillType;
use App\Models\ProjectStatus;
use App\Models\ProjectOffer;
use Illuminate\Http\Request;
use App\Models\Language;

class ProjectController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth','verified']);
    }
	
	public function registerForm(Project $project) 
	{
		return view('project.register', [
			'project' => $project,
            'disciplines' => Discipline::all(),
            'dutyTypes' => DutyType::all(),
            'duties' => Duty::all(),
            'countries' => Country::all(),
            'genders' => Gender::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
            'continents' => Continent::all(),
            'skillTypes' => SkillType::with('skills')->get(),
            'stati' => ProjectStatus::all(),
            'offers' => ProjectOffer::all(),
		]);
	}

	public function searchForm() 
	{
		return view('project.search');
	}

	public function register(Register $request) 
	{
		$data = $request->all();


        unset($data['_token']);
        unset($data['agb']);



        var_dump($data);

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
