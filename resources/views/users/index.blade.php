
@extends('layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><i class="fa fa-users"></i> Users</li>
        <li class="active">Manage</li>
      </ol>
    </section>

    <!-- Main content -->
      <!-- Small boxes (Stat box) -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
          @if (Session::has('flash_message'))

            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            {{ Session::get('flash_message') }}
           </div>
          @endif

           @if (Session::has('delete_message'))

            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            {{ Session::get('delete_message') }}
           </div>
          @endif
            <!-- /.box-header -->
            <!-- form start -->
            <a rel="facebox" class="btn btn-info btn-sm" href="{{ URL::to('users/create')}}">new user</a>
            <a class="btn btn-warning btn-sm" href="{{ URL::to('users/report')}}">Report</a>
            <br><br>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($users as $user)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->type}}</td>
                  <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a rel="facebox" href="{{URL::to('users/edit/'.$user->id)}}">Update</a></li>
                    <li><a href="{{URL::to('users/individual/report/'.$user->id)}}">Report</a></li>
                    @if($user->status == 1)
                    <li><a href="{{URL::to('users/deactivate/'.$user->id)}}" onclick="return (confirm('Are you sure you want to deactivate this user?'))">Deactivate</a></li>
                    @else
                    <li><a href="{{URL::to('users/deactivate/'.$user->id)}}" onclick="return (confirm('Are you sure you want to activate this user?'))">Activate</a></li>
                    @endif
                  </ul>
              </div>

                    </td>
                </tr>
                <?php $i++;?>
                @endforeach
                </tbody>
               
              </table>
            
          <!-- /.box -->
        </div>
        
          </div>
          </div>

          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
  @stop