<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Continent;
use App\Models\Discipline;
use App\Models\Duty;
use App\Models\DutyTypes;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\Volunteer;
use App\Http\Requests\Volunteer\Update;
use App\Http\Requests\Volunteer\Register;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Schema;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contact()
    {
    }

    public function list()
    {
        if (!Auth::user()->volunteer) {
            return redirect()->route('volunteer.registerForm');
        }

        return view('volunteer.list');
    }

    public function registerForm()
    {
        if (Auth::user()->volunteer) {
            return redirect()->route('volunteer.list');
        }

        return view('volunteer.register', [
            'disciplines' => Discipline::all(),
            'dutyTypes' => DutyTypes::all(),
            'duties' => Duty::all()
        ]);
    }

    public function testForm()
    {
        return view('volunteer.test', [
            'countries' => Country::all(),
            'genders' => Gender::all(),
            'disciplines' => Discipline::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
            'continents' => Continent::all(),
            'duties' => Duty::all(),
            'dutyTypes' => DutyTypes::all(),
        ]);
    }

    public function searchForm()
    {
        return view('volunteer.search');
    }

    public function show(Volunteer $volunteer)
    {
        return view('volunteer.preview', ['volunteer' => $volunteer]);
    }

    public function register(Register $request)
    {
        $data = $request->validated();

        unset($data['_token']);
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

        $volunteer->disciplines()->attach(array_keys($discipline));
        $volunteer->continents()->attach(array_keys($continent));
        $volunteer->skills()->attach(array_keys($skill));

        foreach ($duty as $key => $values) {
            $volunteer->duties()->attach(array_keys($values), ['duty_type_id' => $key]);
        }

        return redirect()->route('volunteer.list');
    }

    public function edit(Volunteer $volunteer)
    {
        if (!Auth::user()->volunteer) {
            return redirect()->route('volunteer.registerForm');
        }

        return view('volunteer.edit',[
            'volunteer' => $volunteer,
            'disciplines' => Discipline::all(),
            'dutyTypes' => DutyTypes::all(),
            'duties' => Duty::all()
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

        foreach ($language as $key => $value) {
            $languagesForSync[$key] = ['language_proficiency_id' => $value];
        }

        $volunteer->languages()->sync($languagesForSync);

        $volunteer->disciplines()->sync(array_keys($discipline));
        $volunteer->continents()->sync(array_keys($continent));
        $volunteer->skills()->sync(array_keys($skill));

        foreach ($duty as $key => $values) {
            $volunteer->duties()->syncWithPivotValues(array_keys($values), ['duty_type_id' => $key]);
        }

        return redirect()->route('volunteer.list');
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
