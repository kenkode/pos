
@extends('layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Show</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL::to('/users')}}"><i class="fa fa-users"></i> Users</a></li>
        <li class="active">Show</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <!-- small box -->
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Show </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div style="margin-left: 10px;">
            <br>
            @if($user->status == 1)
            <a class="btn btn-warning btn-sm" href="{{ URL::to('users/')}}">Go Back</a>
            <a class="btn btn-primary btn-sm" href="{{ URL::to('users/edit/'.$user->id)}}">Update</a>
            <a class="btn btn-danger btn-sm" href="{{ URL::to('users/deactivate/'.$user->id)}}" onclick="return (confirm('Are you sure you want to deactivate this user?'))">Deactivate</a>
            @else
            <a class="btn btn-warning btn-sm" href="{{ URL::to('users/inactives')}}">Go Back</a>
            <a class="btn btn-primary btn-sm" href="{{ URL::to('users/edit/'.$user->id)}}">Update</a>
            <a class="btn btn-danger btn-sm" href="{{ URL::to('users/activate/'.$user->id)}}" onclick="return (confirm('Are you sure you want to activate this user?'))">Activate</a>
            @endif
            <a class="btn btn-success btn-sm" href="{{ URL::to('users/individual/report/'.$user->id)}}">Report</a>
            <br><br>
            <table border="1" class="table table-bordered table-hover">
              <tr>
                <td>Username:</td>
                <td>{{$user->name}}</td>
              </tr>
              <tr>
                <td>Email:</td>
                <td>{{$user->email}}</td>
              </tr>
              <tr>
                <td>Role:</td>
                <td>{{$user->type}}</td>
              </tr>
              
            </table>
          </div>
          <!-- /.box -->
        </div>
        
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
  @stop
