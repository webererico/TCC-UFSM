<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $reports = DB::table('reports')->count();
        $airSpeed = DB::table('wind_speeds')->latest()->first();
        $windDirection = DB::table('wind_directions')->latest()->first();
        $batteryVoltage = DB::table('battery_voltages')->latest()->first();
        $powerGenerated = DB::table('power_generateds')->latest()->first();
        $acumulatedEnergy = DB::table('acumulated_energies')->latest()->first();
        $alerts = DB::table('alerts')->count();

        return view('home', compact('users', 'reports', 'airSpeed', 'windDirection', 'batteryVoltage', 'powerGenerated', 'acumulatedEnergy', 'alerts'));

    }
}
