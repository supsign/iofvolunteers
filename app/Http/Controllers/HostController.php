<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Host\Register;
use App\Models\Country;
use App\Models\Host;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\ProjectOffer;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function registerForm()
    {
        return view('host.register', [
            'countries' => Country::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
            'offers' => ProjectOffer::all(),
        ]);
    }

    public function searchForm()
    {
        return (new HomeController())->underConstruction();

        return view('host.search');
    }

    public function register(Register $request)
    {
        $data = $request->validated();

        unset($data['agb']);

        foreach (['offer', 'language'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        $host = Host::create($data);

        Auth::user()->host_id = $host->id;
        Auth::user()->save();

        $host->projectOffers()->attach(array_keys(array_filter($offer)));

        foreach ($language as $key => $value) {
            $host->languages()->attach($key, ['language_proficiency_id' => $value]);
        }

        Alert::toast('Saved', 'success');

        return redirect()->route('home');
    }

    public function editForm(Host $host)
    {
        if (!Auth::user()->host) {
            return redirect()->route('host.registerForm');
        }

        if (Auth::user()->host_id !== $host->id) {
            abort(403);
        }

        return view('host.edit', [
            'host' => $host,
        ]);
    }

    public function update(Host $host, Register $request)
    {
        return Host::update($request->validated());
    }

    public function search()
    {
    }
}
