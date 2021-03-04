<?php

use App\Http\Controllers\AcumulatedEnergyController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\BatteryVoltageController;
use App\Http\Controllers\PowerGeneratedController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WindDirectionController;
use App\Http\Controllers\WindSpeedController;
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



Route::get('/energy', [AcumulatedEnergyController::class,'index'])->name('index.energy');
Route::get('/alert', [AlertController::class,'index'])->name('index.alert');
Route::get('/battery', [BatteryVoltageController::class,'index'])->name('index.battery');
Route::get('/power', [PowerGeneratedController::class,'index'])->name('index.power');
Route::get('/reports', [ReportController::class,'index'])->name('index.report');
Route::get('/direction', [WindDirectionController::class,'index'])->name('index.direction');
Route::get('/speed', [WindSpeedController::class,'index'])->name('index.spped');
Route::get('/users', [UserController::class,'index'])->name('index.users');
Route::get('/profile', [UserController::class,'profile'])->name('index.profile');

