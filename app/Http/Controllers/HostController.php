<?php

namespace App\Http\Controllers;

use App\Http\Requests\HostRegister;
use Illuminate\Http\Request;

class HostController extends Controller
{
	public function registerForm() 
	{
		return view('guest.register');
	}

	public function searchForm() 
	{
		return view('guest.search');
	}

	public function register(HostRegister $request) 
	{

	}

	public function search() 
	{

	}
}
