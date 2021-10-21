<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Guest\Register;
use App\Http\Requests\Guest\Update;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Guest;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Services\Guest\GuestService;
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
        $user = Auth::user();
        if (Auth::user()->guest) {
            return redirect()->route('guest.edit', $user->guest);
        }

        return view('guest.register', [
            'countries' => Country::all(),
            'genders' => Gender::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
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
            'countries' => Country::all(),
            'genders' => Gender::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
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

        foreach (['language'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        $data['birthdate'] = Carbon::parse($data['birthdate']);

        $guest = Guest::create($data);

        Auth::user()->guest_id = $guest->id;
        Auth::user()->save();

        foreach ($language as $key => $value) {
            $guest->languages()->attach($key, ['language_proficiency_id' => $value]);
        }

        Alert::toast('Saved', 'success');

        return redirect()->route('home');
    }

    public function update(Guest $guest, Update $request)
    {
        if (!Auth::user()->guest) {
            return redirect()->route('guest.registerForm');
        }

        if (Auth::user()->guest_id !== $guest->id) {
            abort(403);
        }

        $data = $request->validated();

        unset($data['agb']);

        foreach (['language'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        $guest->update($data);

        $languageSync = array_map(function ($value) {
            return ['language_proficiency_id' => $value];
        }, $language);

        $guest->languages()->sync($languageSync);

        Alert::toast('Saved', 'success');

        return redirect()->route('home');
    }

    public function delete(Guest $guest, GuestService $guestService)
    {
        if (Auth::user()->guest_id !== $guest->id) {
            abort(403);
        }

        $guestService->delete($guest);

        Alert::toast('Guest deleted', 'success');

        return redirect()->route('home');
    }

    public function search()
    {
    }
}
