<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  {{-- <title></title> --}}
  <!-- {{-- <link rel="icon" href="{!! asset('assets/gcm_ico.ico') !!}"/>  --}} -->
</head>
@extends('adminlte::page')
@section('title', 'INRI')

@section('content_header')

@stop
@section('content')
<div class="row">
<div class="col-md-6">
  <!-- general form elements disabled -->
  <div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Create automatic alert</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form role="form">
        <div class="row">
          <div class="col-sm-12">
            <!-- text input -->
            <div class="form-group">
              <label>Alert name</label>
              <input type="text" class="form-control" placeholder="Enter the alert name">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <!-- textarea -->
            <div class="form-group">
              <label>Alert text</label>
              <textarea class="form-control" rows="3" placeholder="Enter the alert description"></textarea>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <!-- select -->
          <div class="form-group">
            <label>Variable</label>
            <select class="form-control">
              <option>Wind Speed</option>
              <option>Power Generated</option>
              <option>Acumulated</option>
              <option>Average</option>
            </select>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Select variable Value</label>
                <select multiple class="form-control">
                  <option>Max</option>
                  <option>Min</option>
                  <option>Standart</option>
                  <option>Average</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Math Logic</label>
                <select multiple class="form-control">
                  <option>Big</option>
                  <option>Equals</option>
                  <option>Small</option>
                  <option>Average</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <!-- checkbox -->
              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                  <label>Value</label>
                  <input type="number" class="form-control" placeholder="Enter value">
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label">Send e-mail</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" checked>
                  <label class="form-check-label">Create report</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox">
                  <label class="form-check-label">Send report by email</label>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-warning">Create Alert</button>
    </div>
    </form>
  </div>
  <!-- /.card-body -->
</div>
<div class="col-md-6">
  <!-- general form elements disabled -->
  <div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Alerts</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Happen</th>
                      <th style="width: 40px">%</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>wind Speed Max</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Wind Direction</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Power Acumulated</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Power generated</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">90%</span></td>
                    </tr>
                  </tbody>
                </table>
    <div>
    </div>
@stop