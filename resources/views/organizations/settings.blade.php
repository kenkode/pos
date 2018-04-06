
@extends('layouts.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Settings
        <small>Show</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Settings</li>
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
              <h3 class="box-title">Update Settings</h3>
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
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('/settings/update/'.$organization->id) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body col-xs-12" style="background: #fff">
                <p style="color: red">Please fill in the fields in *</p>
              
              <div class="col-xs-6">

                <div class="form-group">
                  <label for="exampleInputEmail1">Reorder Level <span style="color: red">*</span></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Reorder Level" value="{{$organization->reorder_level}}" name="reorder_level" required="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">KRA Pin </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter KRA Pin" value="{{$organization->pin}}" name="pin" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">KRA ETR </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter VAT Percentage" value="{{$organization->kra_etr}}" name="kra_etr" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">VAT Number </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter VAT Number" value="{{$organization->vat_no}}" name="vat_no" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">VAT Percentage(%) </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter VAT Percentage" value="{{$organization->vat}}" name="vat" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Serial Number </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter VAT Percentage" value="{{$organization->serial_no}}" name="serial_no" >
                </div>

                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
            </form>
          <!-- /.box -->
        </div>
        
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
  @stop
