<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Guest\Register;
use App\Models\Country;
use App\Models\Discipline;
use App\Models\Duty;
use App\Models\DutyType;
use App\Models\Gender;
use App\Models\Guest;
use App\Models\Language;
use App\Models\LanguageProficiency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Schema;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function registerForm()
    {
        return view('guest.register', [
            'countries' => Country::all(),
            'genders' => Gender::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
            'disciplines' => Discipline::all(),
        ]);
    }

    public function editForm(Guest $guest)
    {
        if (!Auth::user()->guest) {
            return redirect()->route('guest.registerForm');
        }

        if (Auth::user()->guest_id !== $guest->id) {
            abort(403);
        }

        return view('guest.edit', [
            'guest' => $guest,
        ]);
    }

    public function searchForm()
    {
        $extraGenderOption = (new Gender());
        $extraGenderOption->id = 3;
        $extraGenderOption->name = 'doesn\'t matter';

        return view('guest.search', [
            'genders' => Gender::all(),
            'disciplines' => Discipline::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
        ]);
    }

    public function register(Register $request)
    {
        $data = $request->validated();

        unset($data['agb']);

        foreach (['discipline', 'language'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        $data['birthdate'] = Carbon::parse($data['birthdate']);

        $guest = Guest::create($data);

        Auth::user()->guest_id = $guest->id;
        Auth::user()->save();

        foreach ($language as $key => $value) {
            $guest->languages()->attach($key, ['language_proficiency_id' => $value]);
        }

        foreach ($discipline as $key => $value) {
            if ($value) {
                $guest->disciplines()->attach($key);
            }
        }

        Alert::toast('Saved', 'success');

        return redirect()->route('home');
    }

    public function update(Guest $guest, Register $request)
    {
        if (!Auth::user()->guest) {
            return redirect()->route('guest.registerForm');
        }

        if (Auth::user()->guest_id !== $guest->id) {
            abort(403);
        }

        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $columns = array_flip(array_merge(Schema::getColumnListing('guests'), ['minage', 'maxage']));
        $guestData = array_intersect_key($data, $columns);
        $relationData = array_diff_key($data, $columns);
        $guests = Guest::with('languageGuests');

        unset($relationData['_token']);

        foreach ($guestData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'gender_id':
                    if ($value !== 3) {
                        $guests->where($key, $value);
                    }
                    break;
                case 'minage':
                    $guests->where('birthdate', '<=', Carbon::now()->subYears($value));
                    break;
                case 'maxage':
                    $guests->where('birthdate', '>=', Carbon::now()->subYears($value));
                    break;
                case 'ol_duration':
                    $guests->where($key, '<=', Carbon::now()->year - $value);
                    break;
                case 'work_duration':
                    $guests->whereNull($key)->orWhere($key, '>=', $value);
                    break;
                case 'local_experience':
                case 'national_experience':
                case 'international_experience':
                $guests->where($key, '>=', $value);
                    break;

                default:
                    $guests->where($key, $value);
                    break;
            }
        }

        $guests = $guests->get();

        foreach ($relationData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'discipline':
                    $guests = $guests->filterByDisciplines($value);
                    break;
                case 'language':
                    $guests = $guests->filterByLanguages($value);
                    break;
                default:
                    break;
            }
        }

        return view('guest.searchList', [
            'guests' => $guests,
            'dutyTypes' => DutyType::all(),
            'duties' => Duty::all(),
        ]);
    }
}
