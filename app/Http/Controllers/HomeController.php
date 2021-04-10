<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


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

        $userData = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
        $alerts = DB::table('alerts')->count();
        // $year = ['2015','2016','2017','2018','2019','2020'];
        return view('home', compact('users', 'reports', 'airSpeed', 'windDirection', 'batteryVoltage', 'powerGenerated', 'acumulatedEnergy', 'alerts', 'userData'));

    }

    function getLastBatteryVoltage()
{
    echo DB::table('battery_voltages')->latest()->first();
}
}
