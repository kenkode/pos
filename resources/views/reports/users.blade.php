
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

<div align="center"><strong>Users Report</strong></div><br>
    <table class="table tafter" border="1" cellspacing="0" cellpadding="0">

      <tr>
        


        <td><strong># </strong></td>
        <td><strong>Name </strong></td>
        <td><strong>Email </strong></td>
        <td><strong>Role </strong></td>

      </tr>
      <?php $i =1; ?>
      @foreach($users as $user)
      <tr>


       <td>{{$i}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->type}}</td>
       
        </tr>
      <?php $i++; ?>
   
    @endforeach

     
    </table>
   
</div>

</body>

</html>



