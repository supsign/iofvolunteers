<?php

namespace App\Http\Controllers;

use App\Http\Requests\Host\Register;
use App\Models\Country;
use App\Models\Host;
use App\Models\Language;
use App\Models\LanguageProficiency;
use App\Models\ProjectOffer;

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
        return Host::create($request->validated());
    }

    public function update(Host $host, Register $request)
    {
        return Host::update($request->validated());
    }

    public function search()
    {
    }
}
