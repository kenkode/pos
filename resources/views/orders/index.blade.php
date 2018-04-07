
@extends('layouts.main')
@section('content')

<?php

use Illuminate\Support\Facades\Input;

function asMoney($value) {
  return number_format($value, 2);
}

?>

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
        Sales
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"> Sales</li>
      </ol>
    </section>

    <!-- Main content -->
      <!-- Small boxes (Stat box) -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Sales</h3>
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
            <form class="form-inline" method="post" action="{{URL::to('sales/create')}}">
    {{ csrf_field() }}
      <font color="red"><i>All fields marked with * are mandatory</i></font><br>
      <div class="col-lg-12">


        <div class="form-group ">
            <label>Product</label><span style="color:red">*</span> :
            <select name="item" id="item" class="form-control select2" required>
            
            <option> </option>
            <option> ..... select product....</option>
                @foreach($items as $item)
                
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    
                @endforeach
            </select>
        </div>


        <div class="form-group ">
            <label>Quantity</label><span style="color:red">*</span> :
            <input type="text" name="quantity" id="quantity" class="form-control" required>
        </div>

            <input type="hidden" name="qty" id="qty" class="form-control" required>


      <div class="form-group ">
            
            <Button type="submit" class="btn btn-primary" style="width: 123px; height:35px;" /><i class="fa fa-plus fa-large"></i> Add</button>
        </div>

</div>
  </form>

<div class="row">
    <div class="col-lg-12">

    <hr>
        
        @if ( count( $errors ) > 0 )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif


        <br>

    <table class="table table-condensed table-bordered">

    <thead>
        <th>Index</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total Amount</th>
        <th>Actions</th>
    </thead>

    <tbody>

   
        <?php $total = 0; $count = 0;  $vat = 0;  



        ?>
        
        @foreach($orderitems as $orderitem)

            <?php          
            $total_amount = $orderitem['price'] * $orderitem['quantity'];
            $amount = $orderitem['price'] * $orderitem['quantity'];
            /*$total_amount = $amount * $orderitem['duration'];*/
            $total = $total + $amount;
            $vat = $total * 0.16;
            
            ?>
     
        

        <tr>
            <td>{{$count+1}}</td>
            <td>{{$orderitem['item']}}</td>
            <td>{{$orderitem['quantity']}}</td>
            <td>{{asMoney($orderitem['price'])}}</td>  
            <td>{{asMoney($total_amount)}}</td>
            <td>
                <div class="btn-group">
                  <a rel="facebox" href="{{URL::to('orderitems/edit/'.$count)}}" class="btn btn-success"> Edit </a>
                </div>&emsp;
                <div class="btn-group">
                  <a href="{{URL::to('orderitems/remove/'.$count)}}" class="btn btn-danger"  onclick="return (confirm('Are you sure you want to delete this Item?'))"> Delete </a>
                </div>
            </td>
        </tr>

        <?php $count++;?>
        @endforeach


        <tr>
           
            <td></td>
            <td></td>
            <td></td>
            <td><strong><font color="red">Sub Total</font></strong></td>
            <td><strong><font color="red">{{asMoney($total)}}</font></strong></td>
            <td></td>
        </tr>
    </tbody>
        
    </table>

   </div>

</div>

<br>
<form method="post" action="{{URL::to('sales/store')}}">
   {{ csrf_field() }} 
<table border="0" align="right" style="width:400px">
<!-- <tr style="height:50px"><td>Order Discount:</td><td colspan="2"> <input type="text" name="discount" id="discount" onkeypress="grandTotal()" onkeyup="grandTotal()" onblur="grandTotal()" value="0" class="form-control"></td></tr> -->
<tr style="height:50px"><td><strong>Payable Amount</strong></td><td colspan="2"><div class="input-group">
                  <span class="input-group-addon">KES</span> <input type="text" readonly="readonly" name="payable" id="payable" value="{{number_format($total,2)}}" class="form-control"></div></td></tr>

<tr style="height:50px"><td><strong>VAT (16%)</strong></td><td><div class="input-group">
                  <span class="input-group-addon">KES</span><input type="text" readonly="readonly" name="tax" id="tax_amount" value="0" class="form-control tax_check"></div></td></tr>
<script type="text/javascript">
$(document).ready(function(){
   var total = 0;  
    total= ($("#payable").val()*16)/100;
    $("#tax_amount").val(total.toLocaleString('en-US',{minimumFractionDigits: 2}));
    grandTotal();
     });
</script>
<tr style="height:50px"><td><strong>Grand Total</strong></td><td colspan="2"><div class="input-group">
                  <span class="input-group-addon">KES</span><input type="text" name="grand" id="grand" readonly="readonly" value="{{$total+$vat}}" class="form-control"></div></td></tr>
<tr style="height:50px"><td><strong>Amount Paid</strong></td><td colspan="2"><div class="input-group">
                  <span class="input-group-addon">KES</span>
                  <input type="text" class="form-control" id="amount_paid" placeholder="Enter Amount"  value="{{old('amount_paid')}}" name="amount_paid" required="" onkeyup="balance()" onkeypress="balance()">
                  <script type="text/javascript">
                   $(document).ready(function() {
                   $('#amount_paid').priceFormat();
                   });
                  </script>
                </div></td></tr>
<tr style="height:50px"><td><strong>Change</strong></td><td colspan="2">
<div class="input-group">
                  <span class="input-group-addon">KES</span>
  <input type="text" name="change" id="change" class="form-control" readonly="">
</div>
</td></tr>
<tr style="height:50px"><td><strong>Payment Method <span style="color: red">*</span></strong></td><td colspan="2">
<select class='form-control select2' required='' name='payment_method'>
                  <option value='Cash'>Cash</option>
                  <option value='Paybill'>Till Number</option>
                  <option value='Bank'>Atm Card</option>
                </select>
              </td></tr>
<tr style="height:50px"><td><strong>Till No (If Card was used)</strong></td><td colspan="2"><input type="text" name="till_no" class="form-control"></td></tr>
</table>
<div class="row">
    <div class="col-lg-12">
    <hr>

   <!--  <div class="panel-heading"> -->
          <a class="btn btn-danger btn-sm" href="{{ URL::to('sales')}}">Cancel </a>
        <!-- </div> --><input type="submit" class="btn btn-primary pull-right" value="Pay"/>

 </div>


</div>

 </form>

<script type="text/javascript">
function grandTotal(){
 var payable = document.getElementById("payable").value;
 var tax = 0;
 tax+=parseFloat(document.getElementById("tax_amount").value);
 
 
 var total = <?php echo $total ?>;
 var grand = parseFloat(payable)+parseFloat(tax);
 console.log(tax);
 document.getElementById("grand").value=grand.toLocaleString('en-US',{minimumFractionDigits: 2});
}

function balance(){
setTimeout(function() {
 var total = document.getElementById("grand").value.replace(/,/g,'');
 var amount_paid = document.getElementById("amount_paid").value.replace(/,/g,'');
 
 var change = parseFloat(amount_paid) - parseFloat(total);
 console.log(change);
 document.getElementById("change").value=change.toLocaleString('en-US',{minimumFractionDigits: 2});
},100);
}
</script>
            
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