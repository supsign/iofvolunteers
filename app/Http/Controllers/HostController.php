<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Host;
use App\Http\Requests\HostRegister;
use Illuminate\Http\Request;

class HostController extends Controller
{
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
		die();

		return Host::create($request->validated());
	}

	public function update(Host $host, HostRegister $request)
	{
		die();

		return Host::update($request->validated());
	}

	public function search() 
	{

	}
}
