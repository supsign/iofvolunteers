<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Mail\ContactVolunteerMail;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Continent;
use App\Models\Discipline;
use App\Models\Duty;
use App\Models\DutyType;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\SkillType;
use App\Models\Project;
use App\Models\Volunteer;
use App\Http\Requests\Volunteer\Update;
use App\Http\Requests\Volunteer\Register;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Schema;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\Volunteer\VolunteerService;
use Illuminate\Validation\ValidationException;


class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function contact(Volunteer $volunteer, Request $request)
    {
        if (!$project = Project::find($request->project_id)) {
            abort(404);
        }

        try {
            Mail::to($volunteer)->send(new ContactVolunteerMail($volunteer, Auth::user(), $project));
        } catch (\Throwable $th) {
            abort(500, 'Not able to send email');
        }
    }

    public function registerForm()
    {
        $user = Auth::user();
        if (Auth::user()->volunteer) {
            return redirect()->route('volunteer.edit', $user->volunteer);
        }

        return view('volunteer.register', [
            'disciplines' => Discipline::all(),
            'dutyTypes' => DutyType::all(),
            'duties' => Duty::all(),
            'countries' => Country::all(),
            'genders' => Gender::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
            'continents' => Continent::all(),
            'skillTypes' => SkillType::with('skills')->get(),
        ]);
    }

    public function searchForm()
    {
        $extraGenderOption = (new Gender);
        $extraGenderOption->id = 3;
        $extraGenderOption->name = 'doesn\'t matter';

        return view('volunteer.search', [
            'disciplines' => Discipline::all(),
            'dutyTypes' => DutyType::all(),
            'duties' => Duty::all(),
            'countries' => Country::all(),
            'genders' => Gender::all()->push($extraGenderOption),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
            'continents' => Continent::all(),
            'skillTypes' => SkillType::with('skills')->get(),
        ]);
    }

    public function show(Volunteer $volunteer)
    {
        $projects = Auth::user()->projects;
        return view('volunteer.preview', ['volunteer' => $volunteer, 'projects' => $projects]);
    }

    public function register(Register $request)
    {
        $data = $request->validated();

        unset($data['agb']);

        foreach (['o_work_expirence', 'continent', 'discipline', 'duty', 'language', 'skill'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        if (isset($o_work_expirence[1])) {
            $data['o_work_expirence_local'] = $o_work_expirence[1];
        }

        if (isset($o_work_expirence[2])) {
            $data['o_work_expirence_international'] = $o_work_expirence[2];
        }

        $data['birthdate'] = Carbon::parse($data['birthdate']);

        $volunteer = Volunteer::create($data);

        Auth::user()->volunteer_id = $volunteer->id;
        Auth::user()->save();

        foreach ($language as $key => $value) {
            $volunteer->languages()->attach($key, ['language_proficiency_id' => $value]);
        }

        foreach ($discipline as $key => $value) {
            if ($value) {
                $volunteer->disciplines()->attach($key);
            }
        }

        foreach ($continent as $key => $value) {
            if ($value) {
                $volunteer->continents()->attach($key);
            }
        }

        foreach ($skill as $key => $value) {
            if ($value) {
                $volunteer->skills()->attach($key);
            }
        }

        foreach ($duty as $typeId => $content) {
            foreach ($content as $dutyId => $value) {
                if ($value) {
                    $volunteer->duties()->attach($dutyId, ['duty_type_id' => $typeId]);
                }
            }
        }

        Alert::toast('Saved', 'success');
        return redirect()->route('home');
    }

    public function editForm(Volunteer $volunteer)
    {
        if (!Auth::user()->volunteer) {
            return redirect()->route('volunteer.registerForm');
        }

        if (Auth::user()->volunteer_id !== $volunteer->id) {
            abort(403);
        }

        return view('volunteer.edit', [
            'volunteer' => $volunteer,
            'disciplines' => Discipline::all(),
            'dutyTypes' => DutyType::all(),
            'duties' => Duty::all(),
            'countries' => Country::all(),
            'genders' => Gender::all(),
            'languages' => Language::all(),
            'languageProficiencies' => LanguageProficiency::all(),
            'continents' => Continent::all(),
            'skillTypes' => SkillType::with('skills')->get(),
        ]);
    }

    public function update(Volunteer $volunteer, Update $request)
    {
        if (Auth::user()->volunteer_id !== $volunteer->id) {
            abort(403);
        }

        $data = $request->validated();

        unset($data['agb']);

        foreach (['o_work_expirence', 'continent', 'discipline', 'duty', 'language', 'skill'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        if (array_key_exists(1, $o_work_expirence)) {
            if ($o_work_expirence[1] > 1000) {
                throw ValidationException::withMessages([]);
            }
            $data['o_work_expirence_local'] = $o_work_expirence[1];
        }


        if (array_key_exists(2, $o_work_expirence)) {
            if ($o_work_expirence[2] > 1000) {
                throw ValidationException::withMessages([]);
            }

            $data['o_work_expirence_international'] = $o_work_expirence[2];
        }

        $data['birthdate'] = Carbon::parse($data['birthdate']);

        $volunteer->update($data);

        $languageSync = array_map(function ($value) {
            return  ['language_proficiency_id' => $value];
        }, $language);
        $volunteer->languages()->sync($languageSync);


        $disciplineSync = array_filter($discipline, function ($value) {
            return $value;
        });
        $volunteer->disciplines()->sync(array_keys($disciplineSync));


        $continentSync = array_filter($continent, function ($value) {
            return $value;
        });
        $volunteer->continents()->sync(array_keys($continentSync));

        $skillSync = array_filter($skill, function ($value) {
            return $value;
        });
        $volunteer->skills()->sync(array_keys($skillSync));

        $volunteer->dutyVolunteer()->delete();
        foreach ($duty as $typeId => $content) {
            foreach ($content as $dutyId => $value) {
                if ($value) {
                    $volunteer->duties()->attach($dutyId, ['duty_type_id' => $typeId]);
                }
            }
        }

        Alert::toast('Saved', 'success');
        return redirect()->route('volunteer.edit', $volunteer);
    }


    public function search(Request $request)
    {
        $data = $request->all();
        $columns = array_flip(array_merge(Schema::getColumnListing('volunteers'), ['minage', 'maxage']));
        $volunteerData = array_intersect_key($data, $columns);
        $relationData = array_diff_key($data, $columns);
        $volunteers = Volunteer::with('languageVolunteers');

        unset($relationData['_token']);

        foreach ($volunteerData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'gender_id': if ($value != 3) {
                    $volunteers->where($key, $value);
                } break;
                case 'minage': $volunteers->where('birthdate', '<=', Carbon::now()->subYears($value)); break;
                case 'maxage': $volunteers->where('birthdate', '>=', Carbon::now()->subYears($value)); break;
                case 'ol_duration': $volunteers->where($key, '<=', Carbon::now()->year - $value); break;
                case 'work_duration': $volunteers->whereNull($key)->orWhere($key, '>=', $value); break;
                case 'local_experience':
                case 'national_experience':
                case 'international_experience': $volunteers->where($key, '>=', $value); break;

                default: $volunteers->where($key, $value); break;
            }
        }

        $volunteers = $volunteers->get();

        foreach ($relationData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'discipline': $volunteers = $volunteers->filterByDisciplines($value); break;
                case 'language': $volunteers = $volunteers->filterByLanguages($value); break;
                case 'skillType': $volunteers = $volunteers->filterBySkillType($value); break;
                default: break;
            }
        }

        return view('volunteer.searchList', [
            'volunteers' => $volunteers,
            'dutyTypes' => DutyType::all(),
            'duties' => Duty::all(),
        ]);
    }

    public function delete(Volunteer $volunteer, VolunteerService $volunteerService)
    {
        if (Auth::user()->volunteer_id !== $volunteer->id) {
            abort(403);
        }

        $volunteerService->delete($volunteer);

        Alert::toast('Volunteer deleted', 'success');
        return redirect()->route('home');
    }
}
