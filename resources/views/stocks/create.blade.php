<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
<form action="{{ url('/stocks/store') }}" method="post">
{{ csrf_field() }}
<center><h4><i class="icon-plus-sign icon-large"></i> Add Stock</h4></center>
<hr>
<div id="ac">
<span>Item : </span><select name="item" class="select2" required="" style="width:265px; height:30px;" >
<option value=""></option>
@foreach($items as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
</select><br>
<span>Quantity : </span><input type="text" style="width:265px; height:30px;" name="quantity" Required/><br>
<span>Date: </span><input type="date" style="width:265px; height:30px;" class="tcal tcalInput" name="date" ></input><br>
<div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Save</button>
</div>
</div>
</form>