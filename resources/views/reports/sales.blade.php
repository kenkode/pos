
<html >



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>



</head>

<body>

  <div class="header" style="margin-top:-150px; background: #ffffff !important">
     <table class="tpage" style="background: #ffffff !important">

      <tr>


       
        <td style="width:100px">

            <img src="{{str_replace(' ','%20',public_path().'/uploads/logo/'.$organization->logo)}}" alt="logo" />

    
        </td>

        <td style="width:100px;">
          <br>
          <h1>
        <strong>
          {{ strtoupper($organization->name)}}
          </strong>
       </h1>

        </td>
        

      </tr>



    </table>
   </div>

<br/>


  <div class="content" style='margin-top:-70px;'>

<div align="center"><strong>Sales report between {{date('F d, Y', strtotime($from))}} and {{date('F d, Y', strtotime($to))}}</strong></div><br>
    <table class="table tafter" border="1" cellspacing="0" cellpadding="0">

      <tr>
                  <td><strong>#</strong></td>
                  <td><strong>Order No.</strong></td>
                  <td><strong>Date</strong></td>
                  <td><strong>Amount</strong></td>
                  <td><strong>Payment Method</strong></td>
                  <td><strong>Till Number</strong></td>
                  <td><strong>Inserted By</strong></td>
      </tr>
      <?php $i=1; $total = 0;?>
                @foreach($orders as $order)
                @if($order->status == 0)
                <?php $total = $total + $order->amount; ?>
                
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$order->order_no}}</td>
                  <td>{{date('F d, Y', strtotime($order->date))}}</td>
                  <td>{{number_format($order->amount,2)}}</td>
                  <td>{{$order->payment_method}}</td>
                  <td>{{$order->transaction_no}}</td>
                  <td>{{$order->user->name}}</td>
                  

                  
                  
                </tr>
                <?php $i++;?>
                @endif
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>{{number_format($total,2)}}</strong></td>
                    <td></td>
                    <td></td>
                    <td></td> 
                </tr>
     
    </table>
   
</div>

</body>

</html>



