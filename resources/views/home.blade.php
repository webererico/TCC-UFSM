<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {{-- <title></title> --}}
    <!-- {{-- <link rel="icon" href="{!! asset('assets/gcm_ico.ico') !!}"/>  --}} -->
</head>
@extends('adminlte::page')
@section('title', 'INRI')

@section('content_header')

<h1>Welcome, {{Auth::user()->name}}</h1>



@stop
@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$airSpeed->standard}}</h3>

                <p>Air Speed</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-wind"></i>
              </div>
              <a href="/speed" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$windDirection->standard ?? 0 }}<sup style="font-size: 20px">%</sup></h3>

                <p>Wind Direction</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-paper-plane"></i>
              </div>
              <a href="/direction" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$batteryVoltage->standart ?? 0}}<sup style="font-size: 20px">%</sup></h3>

                <p>Battery Voltage</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-bolt"></i>
              </div>
              <a href="/battery" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$powerGenerated ?? 0}}<sup style="font-size: 20px">%</sup></h3>

                <p>Power Generated</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-car-battery"></i>
              </div>
              <a href="/power" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$acumulatedEnergy->standard ?? 0}}<sup style="font-size: 20px">%</sup></h3>

                <p>Acumulated Energy</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-battery-full"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$alerts ?? 0}}<sup style="font-size: 20px">%</sup></h3>

                <p>Alerts</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              </div>
              <a href="/alert" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$reports}}</h3>

                <p>Reports</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-file-alt"></i>
              </div>
              <a href="/reports" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$users}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-fw fa-users"></i>
              </div>
              <a href="/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>
      <div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>

    var barChartData = {
        labels: ['WindDirection'],
        datasets: [{
            label: 'wind Direction',
            backgroundColor: "blue",
            data: windDirectionList
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Yearly User Joined'
                }
            }
        });
    };
</script>
</section>

@stop