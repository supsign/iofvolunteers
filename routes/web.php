<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContinentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/guest/registerForm', [GuestController::class, 'registerForm'])->name('guest.registerForm');
Route::get('/guest/search', [GuestController::class, 'searchForm'])->name('guest.searchForm');

Route::get('/host/registerForm', [HostController::class, 'registerForm'])->name('host.registerForm');
Route::get('/host/search', [HostController::class, 'searchForm'])->name('host.searchForm');

Route::get('/project/registerForm', [ProjectController::class, 'registerForm'])->name('project.registerForm');
Route::get('/project/search', [ProjectController::class, 'searchForm'])->name('project.searchForm');

Route::get('/volunteer/registerForm', [VolunteerController::class, 'registerForm'])->name('volunteer.registerForm');
Route::get('/volunteer/search', [VolunteerController::class, 'searchForm'])->name('volunteer.searchForm');
