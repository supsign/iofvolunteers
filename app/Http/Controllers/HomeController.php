<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
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
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function underConstruction()
    {
        Alert::toast('Unavailable - Under Construction', 'error');
        return redirect()->route('home');
    }
}
