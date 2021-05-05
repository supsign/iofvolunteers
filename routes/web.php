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

Route::get('/guest/register', [GuestController::class, 'registerForm'])->name('guest.registerForm');
Route::get('/guest/search', [GuestController::class, 'searchForm'])->name('guest.searchForm');
Route::post('/guest/register', [GuestController::class, 'register'])->name('guest.register');
Route::post('/guest/search', [GuestController::class, 'search'])->name('guest.search');

Route::get('/host/register', [HostController::class, 'registerForm'])->name('host.registerForm');
Route::get('/host/search', [HostController::class, 'searchForm'])->name('host.searchForm');
Route::post('/host/register', [HostController::class, 'register'])->name('host.register');
Route::post('/host/search', [HostController::class, 'search'])->name('host.search');

Route::get('/project/register', [ProjectController::class, 'registerForm'])->name('project.registerForm');
Route::get('/project/search', [ProjectController::class, 'searchForm'])->name('project.searchForm');
Route::post('/project/register', [ProjectController::class, 'register'])->name('project.register');
Route::post('/project/search', [ProjectController::class, 'search'])->name('project.search');

Route::get('/volunteer/register', [VolunteerController::class, 'registerForm'])->name('volunteer.registerForm');
Route::get('/volunteer/search', [VolunteerController::class, 'searchForm'])->name('volunteer.searchForm');
Route::post('/volunteer/registerForm', [VolunteerController::class, 'register'])->name('volunteer.register');
Route::post('/volunteer/search', [VolunteerController::class, 'search'])->name('volunteer.search');
