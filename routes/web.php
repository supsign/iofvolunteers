<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\MediaDownloadController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::get('/home', function () {
    return redirect(route('home'));
});

Route::controller(TestController::class)->group(function () {
    Route::get('test', 'test')->name('test');
});

// Guest routes
Route::controller(GuestController::class)->group(function () {
    Route::get('guest/show/{guest}', 'show')->name('guest.show');
    Route::get('guest/register', 'registerForm')->name('guest.registerForm');
    Route::get('guest/edit/{guest}', 'editForm')->name('guest.edit');
    Route::get('guest/search', 'searchForm')->name('guest.searchForm');
    Route::get('guest/search/result', 'search')->name('guest.search');
    Route::post('guest/register', 'register')->name('guest.register');
    Route::patch('guest/update/{guest}', 'update')->name('guest.update');
    Route::delete('guest/delete/{guest}', 'delete')->name('guest.delete');
});

// Host routes
Route::controller(HostController::class)->group(function () {
    Route::get('host/show/{host}', 'show')->name('host.show');
    Route::get('host/edit/{host}', 'editForm')->name('host.edit');
    Route::get('host/register', 'registerForm')->name('host.registerForm');
    Route::get('host/search', 'searchForm')->name('host.searchForm');
    Route::get('host/search/result', 'search')->name('host.search');
    Route::post('host/contact/{host}', 'contact')->name('host.contact');
    Route::post('host/register', 'register')->name('host.register');
    Route::patch('host/update/{host}', 'update')->name('host.update');
    Route::delete('host/delete/{host}', 'delete')->name('host.delete');
});

// Project routes
Route::controller(ProjectController::class)->group(function () {
    Route::post('project/contact/{project}', 'contact')->name('project.contact');
    Route::get('project/show/{project}', 'show')->name('project.show');
    Route::get('project/register', 'registerForm')->name('project.registerForm');
    Route::get('project/list', 'list')->name('project.list');
    Route::get('project/edit/{project}', 'editForm')->name('project.edit');
    Route::get('project/search', 'searchForm')->name('project.searchForm');
    Route::get('project/search/result', 'search')->name('project.search');
    Route::post('project/register', 'register')->name('project.register');
    Route::patch('project/update/{project}', 'update')->name('project.update');
    Route::delete('project/delete/{project}', 'delete')->name('project.delete');
});

// Volunteer routes
Route::controller(VolunteerController::class)->group(function () {
    Route::get('volunteer/show/{volunteer}', 'show')->name('volunteer.show');
    Route::get('volunteer/edit/{volunteer}', 'editForm')->name('volunteer.edit');
    Route::get('volunteer/register', 'registerForm')->name('volunteer.registerForm');
    Route::get('volunteer/search', 'searchForm')->name('volunteer.searchForm');
    Route::get('volunteer/search/result', 'search')->name('volunteer.search');
    Route::post('volunteer/contact/{volunteer}', 'contact')->name('volunteer.contact');
    Route::post('volunteer/register', 'register')->name('volunteer.register');
    Route::patch('volunteer/update/{volunteer}', 'update')->name('volunteer.update');
    Route::delete('volunteer/delete/{volunteer}', 'delete')->name('volunteer.delete');
});

//  Media routes
Route::controller(MediaDownloadController::class)->group(function () {
    Route::get('media/download/{mediaItem}', 'download')->name('media.download');
    Route::get('media/show/{mediaItem}', 'show')->name('media.show');
});

Route::controller(Controller::class)->group(function() {
    Route::post('{model}/{id}/isactive', 'setIsActive')->name('isActive');
});
