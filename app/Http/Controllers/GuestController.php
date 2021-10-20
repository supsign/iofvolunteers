<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRegister;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Language;
use App\Models\LanguageProficiency;

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
        ]);
    }

    public function searchForm()
    {
        return (new HomeController())->underConstruction();

        return view('guest.search');
    }

    public function register(GuestRegister $request)
    {
    }

    public function search()
    {
    }
}
