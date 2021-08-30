<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Project\Register;
use App\Http\Requests\Project\Update;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Discipline;
use App\Models\Duty;
use App\Models\DutyType;
use App\Models\Gender;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\Project;
use App\Models\ProjectOffer;
use App\Models\ProjectStatus;
use App\Models\SkillType;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function list(Project $projects)
    {
        $projects = Project::all();

        return view('project.list', [
            'projects' => Project::all(),
        ]);
    }

    public function editForm()
    {
        return (new HomeController())->underConstruction();
    }

    public function registerForm()
    {
        return view('project.register', [
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
        return (new HomeController())->underConstruction();

        return view('project.search');
    }

    public function register(Register $request)
    {
        $data = $request->validated();

        unset($data['agb']);

        foreach (['offer', 'discipline', 'skill', 'duty'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        $data['user_id'] = Auth::user()->id;

        $project = Project::create($data);

        $project->projectOffer()->attach(array_keys(array_filter($offer)));
        $project->disciplines()->attach(array_keys(array_filter($discipline)));
        $project->skills()->attach(array_keys(array_filter($skill)));

        foreach ($duty as $key => $values) {
            $project->duties()->attach(array_keys(array_filter($values)), ['duty_type_id' => $key]);
        }

        Alert::toast('Saved', 'success');

        return redirect()->route('home');

        return redirect()->route('project.list');    //	gibts noch nicht
    }

    public function update(Project $project, Update $request)
    {
        return Project::update($request->validated());
    }

    public function search()
    {
    }
}
