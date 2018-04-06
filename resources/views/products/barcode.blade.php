<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
<form action="{{ url('/products/barcode/'.$item->id) }}" method="post">
{{ csrf_field() }}
<center><h4><i class="icon-plus-sign icon-large"></i> Print Barcode</h4></center>
<hr>
<div id="ac">
<span>Name : </span><input type="text" style="width:265px; height:35px;" name="name" value="{{$item->name}}" readonly="" /><br>
<span>Number of Copies : </span><input type="number" style="width:265px; height:35px;" name="copies" Required/><br>
<div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-print fa-large"></i> Print</button>
</div>
</div>
</form>