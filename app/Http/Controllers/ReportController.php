<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Models\Variable;
use Illuminate\Http\Request;
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
        $reports = DB::table('reports')->orderBy('created_at', 'DESC')->paginate(10);
        $users = User::all();
        return view('report/index', compact('reports', 'users'));
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
        if($to < $from) {
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
        if(!empty($report)){
            $report->delete();
            dump('deletou');
            if ($report = true) {
                return redirect()
                    ->back()
                    ->with('success', 'Report deleted!');
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Error to delete report :(');
            }
        }
    }
}
