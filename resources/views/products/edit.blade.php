<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
<form action="{{ url('/products/update/'.$product->id) }}" method="post">
{{ csrf_field() }}
<center><h4><i class="icon-plus-sign icon-large"></i> Edit Product</h4></center>
<hr>
<div id="ac">
<span>Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="{{$product->name}}" Required/><br>
<span>Buying Price : </span><input type="text" style="width:265px; height:30px;" value="{{$product->buying_price * 100}}" name="buying_price" id="buying_price" required="" /><br>
<script type="text/javascript">
                   $(document).ready(function() {
                   $('#buying_price').priceFormat();
                   });
                  </script>
<span>Selling Price : </span><input type="text" style="width:265px; height:30px;" value="{{$product->selling_price * 100}}" name="selling_price" id="selling_price" required="" /><br>
<script type="text/javascript">
                   $(document).ready(function() {
                   $('#selling_price').priceFormat();
                   });
                  </script>
<span>Category : </span><select name="category" required="" style="width:265px; height:30px;" >
<option value=""></option>
@foreach($categories as $category)
                  <option value="{{$category->id}}"<?= ($product->category_id==$category->id)?'selected="selected"':''; ?>>{{$category->name}}</option>
                  @endforeach
</select><br>
<span>Supplier : </span><select name="supplier" required="" style="width:265px; height:30px;" >
<option value=""></option>
@foreach($clients as $supplier)
                  <option value="{{$supplier->id}}"<?= ($product->client_id==$supplier->id)?'selected="selected"':''; ?>>{{$supplier->name}}</option>
                  @endforeach
</select><br>
<span>Expiry Date : </span><input type="date" style="width:265px; height:30px;" value="{{$product->expiry_date}}" class="tcal tcalInput" name="expiry_date" ></input><br>
<span>Date Purchased : </span><input type="date" style="width:265px; height:30px;" class="tcal tcalInput" name="date" value="{{$product->date}}"></input><br>
<div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Save</button>
</div>
</div>
</form>