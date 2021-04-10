<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {{-- <title></title> --}}
    <!-- {{-- <link rel="icon" href="{!! asset('assets/gcm_ico.ico') !!}"/>  --}} -->
</head>
@extends('adminlte::page')
@section('title', 'INRI')
@section('content_header')

<h1 class="row"> 
</h1>

@stop
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">User List</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    @if ($auth->admin == true)
                    <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                      @if ($auth->admin == true)
                        @if ($user->admin == false )
                          <td> <a href="{!! route('makeAdmin.users', ['id' => $user->id]) !!}" class="btn btn-sm btn-primary"> Make admin</a></td>
                        @else 
                        <td> Is admin</td>
                        @endif  
                        <td>  <a href="{!! route('destroy.users', ['id' => $user->id]) !!}" class="btn btn-sm btn-danger"> Remove user</a></td>
                      @endif
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