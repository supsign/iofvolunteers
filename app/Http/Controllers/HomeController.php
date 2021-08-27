<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function underConstruction()
    {
        Alert::toast('Unavialible - Under Construction', 'error');
        return redirect()->route('home');
    }
}
