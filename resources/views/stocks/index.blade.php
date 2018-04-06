
@extends('layouts.main')
@section('content')

<style>
.code{
height: 60px !important;
}
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stocks
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"> Stock</li>
      </ol>
    </section>

    <!-- Main content -->
      <!-- Small boxes (Stat box) -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Stocks</h3>
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
            <a rel="facebox" class="btn btn-info btn-sm" href="{{ URL::to('stocks/create')}}">new stock</a>
            <a class="btn btn-warning btn-sm" href="{{ URL::to('stocks/report')}}">Report</a>
            <br><br>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Quantity In</th>
                  <th>Quantity Out</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($stocks as $stock)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$stock->item->name}}</td>
                  <td>{{$stock->quantity_in}}</td>
                  <td>{{$stock->quantity_out}}</td>
                  <td>{{date('F d, Y', strtotime($stock->date))}}</td>
                  <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a rel="facebox" href="{{URL::to('stocks/edit/'.$stock->id)}}">Update</a></li>
                    <li><a href="{{URL::to('stocks/individual/report/'.$stock->id)}}">Report</a></li>
                    <li><a href="{{URL::to('stocks/delete/'.$stock->id)}}" onclick="return (confirm('Are you sure you want to delete this stock?'))">Delete</a></li>
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