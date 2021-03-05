<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {{-- <title></title> --}}
    <!-- {{-- <link rel="icon" href="{!! asset('assets/gcm_ico.ico') !!}"/>  --}} -->
</head>
@extends('adminlte::page')
@section('title', 'INRI')
@section('content_header')

<h1 class="row"> 
<button type="button" class="btn btn-block btn-primary">View Graph</button>
</h1>

@stop
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Battery Voltage</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Max</th>
                    <th>Min</th>
                    <th>Average</th>
                    <th>Standard</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($valueList as $value) : ?>
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->max}}</td>
                      <td>{{$value->min}}</td>
                      <td>{{$value->average}}</td>
                      <td>{{$value->standard}}</td>
                      @if($value->status ==1)
                        <td><span class="badge bg-success">Normal</td>
                      @else
                      <td><span class="badge bg-danger">Error</td>
                      @endif
                      <td>{{date('d-m-Y h:m:s', strtotime($value->created_at))}}</td> 
                    </tr>      
                        
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
@stop