<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
<form action="{{{ URL::to('orderitems/edit/'.$id) }}}" method="post">
{{ csrf_field() }}
<center><h4><i class="icon-plus-sign icon-large"></i> Edit {{$editItem['item']}} Quantity</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="edit_id" value="{{$id}}">
<span>Quantity : </span><input type="text" style="width:265px; height:30px;" name="qty" id="qty" value="{{$editItem['quantity']}}" required /><br>
<div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Update</button>
</div>
</div>
</form>