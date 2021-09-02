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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Schema;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function list()
    {
        return view('project.list', [
            'projects' => Auth::user()->projects,
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
        return view('project.search', [
            'disciplines' => Discipline::all(),
            'countries' => Country::all(),
            'continents' => Continent::all(),
            'skillTypes' => SkillType::with('skills')->get(),
            'stati' => ProjectStatus::all(),
            'offers' => ProjectOffer::all(),
        ]);
    }

    public function show(Project $project)
    {
        return view('project.preview', [
            'volunteer' => Auth::user()->volunteers,
            'project' => $project,
            'dutyTypes' => DutyType::all(),
        ]);
    }

    public function register(Register $request)
    {
        $data = $request->validated();

        unset($data['agb']);

        foreach (['o_work_experience', 'offer', 'discipline', 'skill', 'duty'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        if (isset($o_work_experience[1])) {
            $data['o_work_experience_local'] = $o_work_experience[1];
        }

        if (isset($o_work_experience[2])) {
            $data['o_work_experience_international'] = $o_work_experience[2];
        }

        $data['user_id'] = Auth::user()->id;
        $data['start_date'] = Carbon::parse($data['start_date']);

        $project = Project::create($data);

        $project->projectOffers()->attach(array_keys(array_filter($offer)));
        $project->disciplines()->attach(array_keys(array_filter($discipline)));
        $project->skills()->attach(array_keys(array_filter($skill)));

        foreach ($duty as $key => $values) {
            $project->duties()->attach(array_keys(array_filter($values)), ['duty_type_id' => $key]);
        }

        Alert::toast('Saved', 'success');

        return redirect()->route('project.list');
    }

    public function update(Project $project, Update $request)
    {
        return Project::update($request->validated());
    }

    public function delete(Project $project)
    {
        return (new HomeController())->underConstruction();
    }

    public function search(Request $request)
    {
        $data = $request->all();

        $columns = array_flip(array_merge(Schema::getColumnListing('projects')));
        $volunteerData = array_intersect_key($data, $columns);
        $relationData = array_diff_key($data, $columns);
        $project = Project::with('languageVolunteers');

        unset($relationData['_token']);

        foreach ($volunteerData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'gender_id':
                    if ($value != 3) {
                        $project->where($key, $value);
                    }
                    break;
                case 'minage':
                    $project->where('birthdate', '<=', Carbon::now()->subYears($value));
                    break;
                case 'maxage':
                    $project->where('birthdate', '>=', Carbon::now()->subYears($value));
                    break;
                case 'ol_duration':
                    $project->where($key, '<=', Carbon::now()->year - $value);
                    break;
                case 'work_duration':
                    $project->whereNull($key)->orWhere($key, '>=', $value);
                    break;
                case 'local_experience':
                case 'national_experience':
                case 'international_experience':
                    $project->where($key, '>=', $value);
                    break;

                default:
                    $project->where($key, $value);
                    break;
            }
        }

        $project = $project->get();

        foreach ($relationData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'discipline':
                    $project = $project->filterByDisciplines($value);
                    break;
                case 'language':
                    $project = $project->filterByLanguages($value);
                    break;
                case 'skillType':
                    $project = $project->filterBySkillType($value);
                    break;
                default:
                    break;
            }
        }

        return view('volunteer.searchList', [
            'projects' => $project,
            'dutyTypes' => DutyType::all(),
            'duties' => Duty::all(),
        ]);
    }
}
