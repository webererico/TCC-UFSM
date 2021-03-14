@extends('adminlte::page')

@section('title', 'INRI')

@section('content_header')
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create new report</h3>
    </div>

    <form method="post" action="/report/new" class="form-horizontal">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter the report name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-12">
                    <textarea class="form-control" name="description" id="description" placeholder="Write the report description"></textarea>
                    <!-- <input type="text" class="form-control" > -->
                </div>
            </div>
            <div class="row">
                    <div class="col-sm-3">
                      <!-- select -->
                      <div class="form-group">
                        <label>Variable</label>
                        <select class="custom-select" name="variable" id="variable">
                        @foreach ($variables as $variable)
                          <option value="{{$variable->id}}">{{$variable->name}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Start Date:</label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control" name="startDate" id="startDate" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Finish Date:</label>
                        <div class="col-sm-8">
                            <input type="datetime-local" class="form-control" name="finishDate" id="finishDate" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                          <label for="customCheckbox2" class="custom-control-label">Send a copy to my email</label>
                        </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create report</button>
            </div>
        </div>
    </form>
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

@stop