@extends('adminlte::page')

@section('title', 'INRI')

@section('content_header')
<h1>Reports</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Report List</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Variable</th>
          <th>Interval</th>
          <th>Created By</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
        </thead>
        <?php foreach ($reports as $report) : ?>
              <tr>
                <td> {{$report->id}} </td>
                <td> {{$report->reportName}}</td>
                <td> {{$report->description}}</td>
                <td> {{$report->variableName}} </td>
                <td> {{\Carbon\Carbon::parse($report->start_at)->format('d/m/Y h:m:s')}} to {{\Carbon\Carbon::parse($report->finish_at)->format('d/m/Y h:m:s')}}</td>                
                <td> {{$report->userName}} </td>
                <td> {{\Carbon\Carbon::parse($report->created_at)->format('d/m/Y h:m:s')}}</td>
                <td>
                  <a href="{!! route('createPDF.report', ['id' => $report->id]) !!}" class="btn btn-sm btn-primary">
                    <i class="fas fa-file-pdf"></i>
                  </a>
                  <a href="/report/download/csv/{{$report->id}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-file-excel"></i>
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                   <i class="fas fa-trash"></i>
                  </button>
                  <div class="modal fade" id="modal-danger">
                  <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                      <div class="modal-header">
                        <h4 class="modal-title">Are you sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>This action will delete the report from the system&hellip;</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <form action="{!! route('destroy.report', ['id' => $report->id]) !!}" method="GET">
                        <button type="submit" class="btn btn-outline-light" >YES</button>
                        </form>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
          
                  <!-- <a href='/report/download/{{$report->id}}' class="label label-success">Download XLS</span> -->
                  <!-- <a href='/report/download/{{$report->id}}' class="label label-success"><i class="fa fa-download"></i> Download PDF</span> -->
                  <!-- <a href='/report/donwload/{{$report->id}}' class="label label-danger"><i class="fa fa-trash"></i> Delete</span></td> -->
                </td>
              </tr>
        <?php endforeach; ?>

      </table>
      <div style="margin-right: 2%" class="pull-right">
        <p> {{ $reports->links() }}</p>
      </div>
    </div>
              
  </div>
  <div class="col-xs-11">
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  @if(session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
  @endif

</div>
@stop