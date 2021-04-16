<?php

use App\Http\Controllers\AcumulatedEnergyController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\BatteryVoltageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PowerGeneratedController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WindDirectionController;
use App\Http\Controllers\WindSpeedController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/refreshVoltage', [HomeController::class, 'getLastBatteryVoltage'])->name('home.refreshBatteryVoltage');



Route::get('/energy', [AcumulatedEnergyController::class,'index'])->name('index.energy');
Route::get('/alert', [AlertController::class,'index'])->name('index.alert');
Route::get('/battery', [BatteryVoltageController::class,'index'])->name('index.battery');
Route::get('/power', [PowerGeneratedController::class,'index'])->name('index.power');
Route::get('/direction', [WindDirectionController::class,'index'])->name('index.direction');
Route::get('/speed', [WindSpeedController::class,'index'])->name('index.speed');

// USERS
Route::get('/users', [UserController::class,'index'])->name('index.users');
Route::get('/users/admin/{id}', [UserController::class, 'makeAdmin'])->name('makeAdmin.users');
Route::get('/users/destroy/{id}', [UserController::class, 'destroy'])->name('destroy.users');


//  PROFILE
Route::get('/profile', [UserController::class,'showProfile'])->name('index.profile');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('update.profile');
Route::get('/profile/delete',  [UserController::class,'deleteProfile'])->name('delete.profile');


// REPORTS
Route::get('/reports', [ReportController::class,'index'])->name('index.report');
Route::get('/report/new', [ReportController::class, 'create'])->name('create.report');
Route::post('/report/new', [ReportController::class, 'store'])->name('store.report');
Route::get('rerport/pdf/{id}', [ReportController::class, 'createPDF'])->name('createPDF.report');
Route::get('report/export/csv/{id}', [ReportController::class, 'exportCSV'])->name('exportCSV.report');
Route::get('/report/destroy/{id}', [ReportController::class, 'destroy'])->name('destroy.report');