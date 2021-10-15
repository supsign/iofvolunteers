<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Host\Register;
use App\Models\Country;
use App\Models\Host;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\ProjectOffer;
use App\Services\Host\HostService;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
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
            'countries' => Country::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
            'offers' => ProjectOffer::all(),
        ]);
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

    public function update(Host $host, Register $request)
    {
        if (Auth::user()->host_id !== $host->id) {
            abort(403);
        }

        $data = $request->validated();

        unset($data['agb']);

        foreach (['offer', 'language'] as $key) {
            $$key = Helper::extractElementByKey($data, $key);
        }

        $host->update($data);

        $languageSync = array_map(function ($value) {
            return ['language_proficiency_id' => $value];
        }, $language);
        $host->languages()->sync($languageSync);

        $host->projectOffers()->sync(array_keys(array_filter($offer)));

        Alert::toast('Saved', 'success');

        return redirect()->route('home');
    }

    public function delete(Host $host, HostService $hostService)
    {
        if (Auth::user()->host_id !== $host->id) {
            abort(403);
        }

        $hostService->delete($host);

        Alert::toast('Host deleted', 'success');

        return redirect()->route('home');
    }

    public function search()
    {
    }
}
