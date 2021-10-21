<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Guest\Register;
use App\Models\Country;
use App\Models\Discipline;
use App\Models\Gender;
use App\Models\Guest;
use App\Models\Language;
use App\Models\LanguageProficiency;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        return (new HomeController())->underConstruction();

        return view('guest.search');
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

    public function search()
    {
    }
}
