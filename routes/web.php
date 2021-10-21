<?php

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect(route('home'));
});

Route::get('test', [TestController::class, 'test'])->name('test');

Route::get('guest/edit/{guest}', [GuestController::class, 'editForm'])->name('guest.edit');
Route::get('guest/register', [GuestController::class, 'registerForm'])->name('guest.registerForm');
Route::get('guest/search', [GuestController::class, 'searchForm'])->name('guest.searchForm');
Route::post('guest/register', [GuestController::class, 'register'])->name('guest.register');
Route::patch('guest/update/{guest}', [GuestController::class, 'update'])->name('guest.update');
Route::post('guest/search', [GuestController::class, 'search'])->name('guest.search');

Route::get('host/show/{host}', [HostController::class, 'show'])->name('host.show');
Route::get('host/edit/{host}', [HostController::class, 'editForm'])->name('host.edit');
Route::get('host/register', [HostController::class, 'registerForm'])->name('host.registerForm');
Route::get('host/search', [HostController::class, 'searchForm'])->name('host.searchForm');
Route::post('host/register', [HostController::class, 'register'])->name('host.register');
Route::post('host/search', [HostController::class, 'search'])->name('host.search');
Route::patch('host/update/{host}', [HostController::class, 'update'])->name('host.update');
Route::delete('host/delete/{host}', [HostController::class, 'delete'])->name('host.delete');

Route::get('project/show/{project}', [ProjectController::class, 'show'])->name('project.show');
Route::get('project/register', [ProjectController::class, 'registerForm'])->name('project.registerForm');
Route::get('project/list', [ProjectController::class, 'list'])->name('project.list');
Route::get('project/edit/{project}', [ProjectController::class, 'editForm'])->name('project.edit');
Route::get('project/search', [ProjectController::class, 'searchForm'])->name('project.searchForm');
Route::post('project/register', [ProjectController::class, 'register'])->name('project.register');
Route::post('project/search', [ProjectController::class, 'search'])->name('project.search');
Route::patch('project/update/{project}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('project/delete/{project}', [ProjectController::class, 'delete'])->name('project.delete');

Route::get('volunteer/show/{volunteer}', [VolunteerController::class, 'show'])->name('volunteer.show');
Route::get('volunteer/edit/{volunteer}', [VolunteerController::class, 'editForm'])->name('volunteer.edit');
Route::get('volunteer/register', [VolunteerController::class, 'registerForm'])->name('volunteer.registerForm');
Route::get('volunteer/search', [VolunteerController::class, 'searchForm'])->name('volunteer.searchForm');
Route::post('volunteer/contact/{volunteer}', [VolunteerController::class, 'contact'])->name('volunteer.contact');
Route::post('volunteer/register', [VolunteerController::class, 'register'])->name('volunteer.register');
Route::post('volunteer/search', [VolunteerController::class, 'search'])->name('volunteer.search');
Route::patch('volunteer/update/{volunteer}', [VolunteerController::class, 'update'])->name('volunteer.update');
Route::delete('volunteer/delete/{volunteer}', [VolunteerController::class, 'delete'])->name('volunteer.delete');

//  Media routes
Route::get('media/download/{mediaItem}', [MediaDownloadController::class, 'download'])->name('media.download');
Route::get('media/show/{mediaItem}', [MediaDownloadController::class, 'show'])->name('media.show');

Route::get('volunteer/test', [VolunteerController::class, 'testForm'])->name('volunteer.testForm');
