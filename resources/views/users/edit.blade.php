<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
<form action="{{ url('/users/update/'.$user->id) }}" method="post">
{{ csrf_field() }}
<center><h4><i class="icon-plus-sign icon-large"></i> Add Supplier</h4></center>
<hr>
<div id="ac">
<span>Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="{{$user->name}}" Required/><br>
<span>Email : </span><input type="email" value="{{$user->email}}" style="width:265px; height:30px;" name="email"/><br>
<span>Role : </span><select name="role" class="select2" required="" style="width:265px; height:30px;" >
<option value=""></option>
<option value="Admin"<?= ($user->type=="Admin")?'selected="selected"':''; ?>>Admin</option>
<option value="Cashier"<?= ($user->type=="Cashier")?'selected="selected"':''; ?>>Cashier</option>
</select><br>
<div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Save</button>
</div>
</div>
</form>