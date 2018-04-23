
@extends('layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sale
        <small>Show</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL::to('/sales')}}"><i class="fa fa-shopping-cart"></i> Sale</a></li>
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
            @if($sale->status == 0)
            <a class="btn btn-warning btn-sm" href="{{ URL::to('view/sales/')}}">Go Back</a>
            @else
            <a class="btn btn-warning btn-sm" href="{{ URL::to('reverse/sales/')}}">Go Back</a>
            @endif
            <a class="btn btn-primary btn-sm" target="_blank" href="{{ URL::to('receipt/'.$sale->id)}}">Receipt</a>
            @if($sale->status == 0)
            <a class="btn btn-danger btn-sm" href="{{ URL::to('reverse/order/'.$sale->id)}}" onclick="return (confirm('Are you sure you want to reverse this order?'))">Reverse Order</a>
            @else
            <a class="btn btn-danger btn-sm" href="{{ URL::to('return/order/'.$sale->id)}}" onclick="return (confirm('Are you sure you want to return this order?'))">Return Order</a>
            @endif
           <br>
           <div class="row">
            <div class="col-lg-12">
            <h4><font color='green'>Sales Order : {{$sale->order_no}} &emsp; |&emsp; Date: {{$sale->date}} &emsp; | &emsp; Status: 
              @if($sale->status == 1)
              Reversed
              @else
              Paid
              @endif
            </font> </h4>

            <hr>
            </div>  
            </div>

            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Sale Type</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;$total=0;?>
                @foreach($orderitems as $orderitem)
                <?php $total = $total + ($orderitem->quantity * $orderitem->price);?>
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$orderitem->item->name}}</td>
                  <td>{{$orderitem->mode}}</td>
                  <td>{{$orderitem->quantity}}</td>
                  <td>{{number_format($orderitem->price,2)}}</td>
                  <td>{{number_format($orderitem->quantity * $orderitem->price,2)}}</td>
                </tr>
                <?php $i++;?>
                @endforeach
                </tbody>

                <tfoot>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><strong>Total</strong></td>
                  <td><strong>{{number_format($total,2)}}</strong></td>
                </tfoot>
               
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
