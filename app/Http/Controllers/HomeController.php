<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Language;
use App\Models\Volunteer;
use App\Models\Skill;
use App\Models\SkillType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
