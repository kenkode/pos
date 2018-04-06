<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
<form action="{{ url('/suppliers/update/'.$client->id) }}" method="post">
{{ csrf_field() }}
<center><h4><i class="icon-plus-sign icon-large"></i> Edit Supplier</h4></center>
<hr>
<div id="ac">
<span>Name : </span><input type="text" style="width:265px; height:30px;" name="name" Required value="{{$client->name}}" /><br>
<span>phone : </span><input type="text" style="width:265px; height:30px;" name="phone" value="{{$client->phone}}"/><br>
<span>Email : </span><input type="email" style="width:265px; height:30px;" name="email" value="{{$client->email}}"/><br>
<span>Address : </span><textarea name="address" style="width:265px; height:70px;">{{$client->address}}</textarea><br>
<div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Update</button>
</div>
</div>
</form>