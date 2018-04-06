<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
<form action="{{ url('/categories/store') }}" method="post">
{{ csrf_field() }}
<center><h4><i class="icon-plus-sign icon-large"></i> Add Category</h4></center>
<hr>
<div id="ac">
<span>Category Name : </span><input type="text" style="width:265px; height:30px;" name="name" Required/><br>
<div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Save</button>
</div>
</div>
</form>