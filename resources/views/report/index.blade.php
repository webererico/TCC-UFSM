@extends('adminlte::page')

@section('title', 'INRI')

@section('content_header')
    <h1>Reports</h1>
@stop

@section('content')
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Saved Reports</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Person</th>
                  <th>Interval</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
              <?php foreach ($reports as $report): ?>
              <?php foreach ($users as $user): ?>
                <?php if ($report->user_id == $user->id): ?>
                  <tr>
                    <td> {{$report->id}} </td>
                    <td>{{$report->name}}</td>
                    <td>{{$report->description}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$report->start_at}} to {{$report->finish_at}}</td>
                    <td>{{$report->created_at}}</td>
                    <td><a href='/report/download/{{$report->id}}' class="label label-success">Download XLS</span>
                    <a href='/report/download/{{$report->id}}' class="label label-success"><i class="fa fa-download"></i> Download PDF</span>
                    <a href='/report/donwload/{{$report->id}}' class="label label-danger"><i class="fa fa-trash"></i> Delete</span></td>
                  </tr>
                <?php endif; ?>
                <?php endforeach; ?>
              <?php endforeach; ?>
              
              </table>
              <div style="margin-right: 2%" class="pull-right">
              <p > {{ $reports->links() }}</p>
              </div>
            </div>
            
            

        </div>

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
