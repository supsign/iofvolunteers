<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Project\Register;
use App\Http\Requests\Project\Update;
use App\Mail\ContactProjectMail;
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
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use Schema;
use Throwable;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function contact(Project $project, Request $request)
    {
        if (!$volunteer = Project::find($request->volunteer_id)) {
            abort(404);
        }

        try {
            Mail::to($volunteer)->send(new ContactProjectMail($project, Auth::user(), $volunteer));

            $volunteer->projects()->syncWithPivotValues(
                [$project->id],
                ['project_contacted_at' => Carbon::now()],
            );
        } catch (Throwable $th) {
            abort(500, 'Not able to send email');
        }
    }

    public function list()
    {
        return view('project.list', [
            'projects' => Auth::user()->projects,
        ]);
    }

    public function editForm(Project $project)
    {
        if (!Auth::user()->projects->count()) {
            return redirect()->route('project.registerForm');
        }

        if (!Auth::user()->projects->contains($project)) {
            abort(403);
        }

        return view('project.edit', [
            'project' => $project,
            'disciplines' => Discipline::all(),
            'dutyTypes' => DutyType::all(),
            'duties' => Duty::all(),
            'countries' => Country::all(),
            'genders' => Gender::all(),
            'continents' => Continent::all(),
            'skillTypes' => SkillType::with('skills')->get(),
            'stati' => ProjectStatus::all(),
            'offers' => ProjectOffer::all(),
        ]);
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
            'volunteer' => Auth::user()->volunteer,
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
        if (Auth::user()->id !== $project->user->id) {
            abort(403);
        }

        $data = $request->validated();

        unset($data['agb']);

        foreach (['o_work_experience', 'offer', 'discipline', 'skill', 'duty'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        if (array_key_exists(1, $o_work_experience)) {
            if ($o_work_experience[1] > 1000) {
                throw ValidationException::withMessages([]);
            }
            $data['o_work_experience_local'] = $o_work_experience[1];
        }

        if (array_key_exists(2, $o_work_experience)) {
            if ($o_work_experience[2] > 1000) {
                throw ValidationException::withMessages([]);
            }

            $data['o_work_experience_international'] = $o_work_experience[2];
        }

        $data['user_id'] = Auth::user()->id;
        $data['start_date'] = Carbon::parse($data['start_date']);

        $project->update($data);

        $project->disciplines()->sync(array_keys(array_filter($discipline)));
        $project->skills()->sync(array_keys(array_filter($skill)));
        $project->projectOffers()->sync(array_keys(array_filter($offer)));
        $project->dutyProject()->delete();

        foreach ($duty as $typeId => $content) {
            foreach ($content as $dutyId => $value) {
                if ($value) {
                    $project->duties()->attach($dutyId, ['duty_type_id' => $typeId]);
                }
            }
        }

        Alert::toast('Saved', 'success');

        return redirect()->route('project.list');
    }

    public function delete(Project $project)
    {
        if (Auth::user()->id !== $project->user->id) {
            abort(403);
        }

        $project->projectProjectOffers()->delete();

        $project->delete();

        Alert::toast('Project deleted', 'success');

        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        $columns = array_flip(array_merge(Schema::getColumnListing('projects')));
        $relationData = array_diff_key($data, $columns);

        $projects = Project::get();

        foreach ($relationData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'continent':
                    $projects = $projects->filterByContinents($value);
                    break;
                case 'offer':
                    $projects = $projects->filterByProjectOffers($value);
                    break;
                case 'discipline':
                    $projects = $projects->filterByDisciplines($value);
                    break;
                case 'skillType':
                    $projects = $projects->filterBySkillType($value);
                    break;
                default:
                    break;
            }
        }

        return view('project.searchList', [
            'projects' => $projects,
        ]);
    }
}
