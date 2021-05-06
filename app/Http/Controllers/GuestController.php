<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRegister;
use Illuminate\Http\Request;

class GuestController extends Controller
{
	public function registerForm() 
	{
		return view('guest.register');
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
