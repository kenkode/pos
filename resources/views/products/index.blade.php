
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
        Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"> Products</li>
      </ol>
    </section>

    <!-- Main content -->
      <!-- Small boxes (Stat box) -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Products</h3>
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
            <a rel="facebox" class="btn btn-info btn-sm" href="{{ URL::to('products/create')}}">new product</a>
            <a class="btn btn-warning btn-sm" href="{{ URL::to('products/report')}}">Report</a>
            <br><br>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Barcode</th>
                  <th>Buying Price</th>
                  <th>Retail Price</th>
                  <th>Wholesale Price</th>
                  <th>Expiry Date</th>
                  <th>Date Purchased</th>
                  <th>Category</th>
                  <th>Supplier</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                @foreach($items as $product)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$product->name}}</td>
                  <td>{!! DNS1D::getBarcodeHTML($product->code, "C128" ,1,13)!!}</td>
                  <td>{{number_format($product->buying_price,2)}}</td>
                  <td>{{number_format($product->retail_price,2)}}</td>
                  <td>{{number_format($product->wholesale_price,2)}}</td>
                  <td>{{date('F d, Y', strtotime($product->expiry_date))}}</td>
                  <td>{{date('F d, Y', strtotime($product->date))}}</td>
                  <td>{{$product->category->name}}</td>
                  <td>{{$product->client->name}}</td>
                  <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a rel="facebox" href="{{URL::to('products/edit/'.$product->id)}}">Update</a></li>
                    <li><a rel="facebox" href="{{URL::to('products/barcode/'.$product->id)}}">Print Barcode</a></li>
                    <li><a href="{{URL::to('products/individual/report/'.$product->id)}}">Report</a></li>
                    <li><a href="{{URL::to('products/delete/'.$product->id)}}" onclick="return (confirm('Are you sure you want to delete this product?'))">Delete</a></li>
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