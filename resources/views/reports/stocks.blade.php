
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
                  <td><strong>Item</strong></td>
                  <td><strong>Opening Stock</strong></td>
                  <td><strong>Stock In</strong></td>
                  <td><strong>Stock Out</strong></td>
                  <td><strong>Closing Stock</strong></td>
      </tr>
      <?php $i=1; $totalopening = 0;$totalqin = 0;$totalqout = 0;$totalclosing = 0;?>
                @foreach($items as $item)
                <?php 
                $totalopening = $totalopening + App\Stock::openingStock($item->id,$from,$to); 
                $totalqin     = $totalqin + App\Stock::stockIn($item->id,$from,$to); 
                $totalqout    = $totalqout + App\Stock::stockOut($item->id,$from,$to); 
                $totalclosing = $totalclosing + App\Stock::closingStock($item->id,$from,$to); 
                ?>
                
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{App\Stock::openingStock($item->id,$from,$to)}}</td>
                  <td>{{App\Stock::stockIn($item->id,$from,$to)}}</td>
                  <td>{{App\Stock::stockOut($item->id,$from,$to)}}</td>
                  <td>{{App\Stock::closingStock($item->id,$from,$to)}}</td>
                </tr>
                <?php $i++;?>
                @endforeach
                <tr>
                    <td></td>
                    <td><strong>Totals</strong></td>
                    <td><strong>{{$totalopening}}</strong></td>
                    <td><strong>{{$totalqin}}</strong></td>
                    <td><strong>{{$totalqout}}</strong></td>
                    <td><strong>{{$totalclosing}}</strong></td>
                </tr>
     
    </table>
   
</div>

</body>

</html>



