<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Continent;
use App\Models\Discipline;
use App\Models\Duty;
use App\Models\DutyType;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\SkillType;
use App\Models\Volunteer;
use App\Http\Requests\Volunteer\Update;
use App\Http\Requests\Volunteer\Register;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Schema;
use Alert;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function contact()
    {
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
        return view('volunteer.search', [
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

    public function show(Volunteer $volunteer)
    {
        return view('volunteer.preview', ['volunteer' => $volunteer]);
    }

    public function register(Register $request)
    {
        $data = $request->validated();

        unset($data['agb']);

        foreach (['o_work_expirence', 'continent', 'discipline', 'duty', 'language', 'skill'] as $key) {
            $$key = Helper::exractElementByKey($data, $key);
        }

        


        if (isset($o_work_expirence[1])) {
            $data['o_work_expirence_local'] = $o_work_expirence[1];
        }

        if (isset($o_work_expirence[2])) {
            $data['o_work_expirence_international'] = $o_work_expirence[2];
        }

        if (empty($data['nickname'])) {
            $data['nickname'] = $data['name'];
        }

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

    public function edit(Volunteer $volunteer)
    {
        if (!Auth::user()->volunteer) {
            return redirect()->route('volunteer.registerForm');
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
        $data = $request->validated();




        unset($data['_token']);

        foreach (['o_work_expirence', 'continent', 'discipline', 'duty', 'language', 'skill'] as $key) {
            $$key = Helper::exractElementByKey($data, $key);
        }
      
        if (isset($o_work_expirence[1])) {
            $data['o_work_expirence_local'] = $o_work_expirence[1];
        }

        if (isset($o_work_expirence[2])) {
            $data['o_work_expirence_international'] = $o_work_expirence[2];
        }

        if (empty($data['nickname'])) {
            $data['nickname'] = $data['name'];
        }

        $volunteer->update($data);

        $languagesForSync = [];
        foreach ($language as $key => $value) {
            $languagesForSync[$key] = ['language_proficiency_id' => $value];
        }

        $volunteer->languages()->sync($languagesForSync);
        $volunteer->disciplines()->sync(array_keys($discipline));
        $volunteer->continents()->sync(array_keys($continent));
        $volunteer->skills()->sync(array_keys($skill));

        $volunteer->dutyVolunteer()->delete();

        foreach ($duty as $key => $values) {
            $volunteer->duties()->attach(array_keys($values), ['duty_type_id' => $key]);
        }

        Alert::toast('Saved', 'success');
        return redirect()->route('home');
    }


    public function search(Request $request)
    {
        $columns = array_flip(Schema::getColumnListing('volunteers'));
        $volunteerData = array_intersect_key($request->all(), $columns);
        $otherData = array_diff_key($request->all(), $columns);
        $volunteers = Volunteer::with('languageVolunteers');

        foreach ($volunteerData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'ol_duration': $volunteers->where($key, '<=', Carbon::now()->year - $value); break;
                default: $volunteers->where($key, $value); break;
            }
        }

        $volunteers = $volunteers->get();

        foreach ($otherData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'minage': $volunteers = $volunteers->where('age', '>=', $value); break;
                case 'maxage': $volunteers = $volunteers->where('age', '<=', $value); break;
                case 'max_work_duration': $volunteers = $volunteers->where('work_duration', '<=', $value); break;
                case 'discipline': $volunteers = $volunteers->filterByDisciplines($value); break;
                case 'language': $volunteers = $volunteers->filterByLanguages($value); break;
                case 'skillType': $volunteers = $volunteers->filterBySkillType($value); break;
                default: break;
            }
        }

        return view('volunteer.searchList', ['volunteers' => $volunteers]);
    }
}
