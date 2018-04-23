
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

<div align="center"><strong>Products Report</strong></div><br>
    <table class="table tafter" border="1" cellspacing="0" cellpadding="0">

      <tr>
        


        <td><strong># </strong></td>
        <td><strong>Item Code </strong></td>
        <td><strong>Name </strong></td>
        <td><strong>Category </strong></td>
        <td><strong>Supplier </strong></td>
        <td><strong>Buying Price </strong></td>
        <td><strong>Retail Price </strong></td>
        <td><strong>Wholesale Price </strong></td>
        <td><strong>Date Purchased </strong></td>
        <td><strong>Expiry Date </strong></td>
        <td><strong>Inserted By </strong></td>

      </tr>
      <?php $i =1; ?>
      @foreach($items as $item)
      <tr>


       <td>{{$i}}</td>
        <td>{{$item->code}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->category->name}}</td>
        <td>{{$item->client->name}}</td>
        <td>{{number_format($item->buying_price,2)}}</td>
        <td>{{number_format($item->retail_price,2)}}</td>
         <td>{{number_format($item->wholesale_price,2)}}</td>
        <td>{{date('F d, Y', strtotime($item->date))}}</td>
        <td>{{date('F d, Y', strtotime($item->expiry_date))}}</td>
        <td>{{$item->user->name}}</td>
       
        </tr>
      <?php $i++; ?>
   
    @endforeach

     
    </table>
   
</div>

</body>

</html>



