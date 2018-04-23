
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
        @if(Auth::user()->type == 'Admin')
        View Sales
        @else
        My Sales
        @endif
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/sales')}}"><i class="fa fa-home"></i> Sale</a></li>
        @if(Auth::user()->type == 'Admin')
        <li class="active"> View Sales</li>
        @else
        <li class="active"> My Sales</li>
        @endif
      </ol>
    </section>

    <!-- Main content -->
      <!-- Small boxes (Stat box) -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              @if(Auth::user()->type == 'Admin')
              <h3 class="box-title">View Sales</h3>
              @else
              <h3 class="box-title">My Sales</h3>
              @endif
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
            Sales
            <br><br>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Order No.</th>
                  <th>Amount</th>
                  <th>Order Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($sales as $sale)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$sale->order_no}}</td>
                  <td>{{number_format($sale->amount,2)}}</td>
                  <td>{{date('F d, Y', strtotime($sale->date))}}</td>
                  @if($sale->status == 0)
                  <td>Paid</td>
                  @else
                  <td>Reversed</td>
                  @endif

                  <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('sales/show/'.$sale->id)}}">View</a></li>
                    <li><a target="_blank" href="{{URL::to('receipt/'.$sale->id)}}">Receipt</a></li>
                    @if($sale->status == 0)
                    <li><a href="{{URL::to('reverse/order/'.$sale->id)}}" onclick="return (confirm('Are you sure you want to reverse this order?'))">Reverse Order</a></li>
                    @else
                    <li><a href="{{URL::to('return/order/'.$sale->id)}}" onclick="return (confirm('Are you sure you want to return this order?'))">Return Order</a></li>
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