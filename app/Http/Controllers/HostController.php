<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\Host\Register;
use App\Http\Requests\Host\Update;
use App\Mail\ContactHostMail;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Guest;
use App\Models\Host;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\ProjectOffer;
use App\Services\Host\HostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Schema;
use Throwable;

class HostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function contact(Host $host, Request $request)
    {
        if (!$guest = Guest::find($request->guest_id)) {
            abort(404);
        }

        try {
            Mail::to($host->contact_email)->send(new ContactHostMail($host, Auth::user(), $guest));
        } catch (Throwable $th) {
            abort(500, 'Not able to send email');
        }
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
        if (Auth::user()->host) {
            return redirect()->route('host.edit', ['host' => Auth::user()->host]);
        }

        return view('host.register', [
            'countries' => Country::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
            'offers' => ProjectOffer::all(),
        ]);
    }

    public function searchForm()
    {
        return view('host.search', [
            'countries' => Country::all(),
            'continents' => Continent::all(),
            'languages' => Language::all(),
            'languageProficiency' => LanguageProficiency::all(),
            'offers' => ProjectOffer::all(),
        ]);
    }

    public function show(Host $host)
    {
        if (Auth::user()->guest) {
            $guest = Auth::user()->guest;
        } else {
            $guest = '';
        }

        return view('host.preview', [
            'host' => $host,
            'guest' => $guest,
        ]);
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

    public function update(Host $host, Update $request)
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

    public function search(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        $columns = array_flip(array_merge(Schema::getColumnListing('hosts'), ['minage', 'maxage']));
        $hostData = array_intersect_key($data, $columns);
        $relationData = array_diff_key($data, $columns);
        $hosts = Host::where('is_active', true)->with('languageHosts');

        foreach ($hostData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'minage':
                    $hosts->where('max_duration', '>=', $value);
                    break;
                case 'maxage':
                    $hosts->where('max_duration', '<=', $value);
                    break;
                default:
                    $hosts->where($key, $value);
                    break;
            }
        }

        $hosts = $hosts->get();

        foreach ($relationData as $key => $value) {
            if (!$value) {
                continue;
            }

            switch ($key) {
                case 'continent':
                    $hosts = $hosts->filterByContinents($value);
                    break;
                case 'language':
                    $hosts = $hosts->filterByLanguages($value);
                    break;
                case 'offer':
                    $hosts = $hosts->filterByProjectOffers($value);
                    break;
                default:
                    break;
            }
        }

        return view('host.searchList', [
            'hosts' => $hosts,
        ]);
    }
}
