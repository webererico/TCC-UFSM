<?php

namespace App\Http\Controllers;

use App\Models\AcumulatedEnergy;
use App\Models\BatteryVoltage;
use App\Models\PowerGenerated;
use App\Models\Report;
use App\Models\User;
use App\Models\Variable;
use App\Models\WindDirection;
use App\Models\WindSpeed;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = DB::table('reports')
            ->join('variables', 'variables.id', '=', 'reports.variable_id')
            ->join('users', 'users.id', '=', 'reports.user_id')
            ->orderBy('reports.created_at', 'DESC')
            ->select('reports.name as reportName', 'variables.name as variableName', 'users.name as userName', 'reports.id as id', 'reports.created_at as created_at', 'reports.description as description', 'reports.start_at as start_at', 'reports.finish_at as finish_at')->paginate(10);
        return view('report/index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variables = Variable::all();
        return view('report/create', compact('variables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report();
        $from = $request->input('startDate');
        $to = $request->input('finishDate');
        if ($to < $from) {
            return redirect()
                ->back()
                ->with('error', 'The data interval is not valid :(');
        }
        $report->variable_id = $request->input('variable');
        $report->name = $request->input('name');
        $report->start_at = $from;
        $report->finish_at = $to;
        $report->description = $request->input('description');
        $report->user_id = Auth::user()->id;
        $report->save();
        if ($enreportsaio = true) {
            return redirect()
                ->back()
                ->with('success', 'Report created!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Error to create report :(');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        dump($report);
        if (!empty($report)) {
            $report->delete();
            dump('apagou');
            if ($report = true) {
                return redirect()->route('index.report')
                    ->with('success', 'Report deleted!');
            } else {
                return redirect()->route('index.report')
                    ->with('error', 'Error to delete report :(');
            }
        }
    }



    public function createPDF($id)
    {
        $report = Report::find($id);
        if(!empty($report)){
            $variable = Variable::find($report->variable_id);
            $listValue = DB::table($variable->table_name)->whereBetween('created_at', [$report->start_at, $report->finish_at]);
        }
        $listValue = User::all();
        // dump( User::all());
        // die;
        $pdf = PDF::loadView('report.pdf', $listValue);
        return $pdf->download('report.pdf');
    }

    public function exportCSV($id) 
    {
        $report = Report::find($id);
        if (!empty($report)) {
            $from = $report->start_at;
            $to = $report->finish_at;
            switch ($report->ambient_id) {
                case 1:
                    $csv = WindSpeed::whereBetween('created_at', [$from, $to])->get();
                    break;
                case 2:
                    $csv = BatteryVoltage::whereBetween('created_at', [$from, $to])->get();
                    break;
                case 3:
                    $csv = PowerGenerated::whereBetween('created_at', [$from, $to])->get();
                    break;
                case 4:
                    $csv = AcumulatedEnergy::whereBetween('created_at', [$from, $to])->get();
                    break;
                case 5:
                    $csv = WindDirection::whereBetween('created_at', [$from, $to])->get();
                    break;
                default: 
                    $csv = [];
                    break;
            }
            
            if (!empty($csv)) {
                
            }
        }
    }
}
