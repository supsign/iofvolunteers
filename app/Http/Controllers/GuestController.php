<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\GuestRegister;
use Illuminate\Http\Request;

class GuestController extends Controller
{
	public function registerForm() 
	{
		return view('guest.register', ['countries' => Country::all()]);
	}

	public function searchForm() 
	{
		return view('guest.search');
	}

	public function register(GuestRegister $request) 
	{

	}

	public function search() 
	{

	}
}
