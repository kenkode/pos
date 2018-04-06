
@extends('layouts.main')
@section('content')

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
    disp_setting+="scrollbars=yes,width=1000, height=500, left=100, top=25"; 
  var content_vlue = document.getElementById("tablecon").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 1000px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

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
        <small>Barcode</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{{URL::to('/products')}}"><i class="fa fa-barcode"></i> Products</a></li>
        <li class="active"> Barcode</li>
      </ol>
    </section>

    <!-- Main content -->
      <!-- Small boxes (Stat box) -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Print Barcodes</h3>
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
            <a class="btn btn-primary btn-sm" href="{{ URL::to('products')}}">Go Back</a>
            <a class="btn btn-success btn-sm" href="javascript:Clickheretoprint()">Print</a>
            <br><br>
            <div class="row" id="tablecon">

          <div class="col-lg-12">
          <?php $i = 0;?>
          @for($j=0; $j<$copies; $j++)
          @if ($i % 12 == 0 && $i !=0)
            </div>
            <div class="col-md-12">
            @endif
          <div class="col-lg-1" >
            {!! DNS1D::getBarcodeHTML($item->code, "C128" ,1,13)!!}<br><br>
          </div>
          
            <?php $i++;?>
          @endfor
             </div>

            </div>
            
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