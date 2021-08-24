<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Host;
use App\Http\Requests\HostRegister;
use Illuminate\Http\Request;

class HostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function registerForm()
    {
        return view('host.register', ['countries' => Country::all()]);
    }

    public function searchForm()
    {
        return view('host.search');
    }

    public function register(HostRegister $request)
    {
        return Host::create($request->validated());
    }

    public function update(Host $host, HostRegister $request)
    {
        exit();
        return Host::update($request->validated());
    }

    public function search()
    {
    }
}
