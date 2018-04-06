<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
<form action="{{ url('/suppliers/store') }}" method="post">
{{ csrf_field() }}
<center><h4><i class="icon-plus-sign icon-large"></i> Add Supplier</h4></center>
<hr>
<div id="ac">
<span>Name : </span><input type="text" style="width:265px; height:30px;" name="name" Required/><br>
<span>phone : </span><input type="text" style="width:265px; height:30px;" name="phone"/><br>
<span>Email : </span><input type="email" style="width:265px; height:30px;" name="email"/><br>
<span>Address : </span><textarea name="address" style="width:265px; height:70px;"></textarea><br>
<div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Save</button>
</div>
</div>
</form>