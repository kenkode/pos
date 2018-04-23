<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
<form action="{{ url('/products/store') }}" method="post">
{{ csrf_field() }}
<center><h4><i class="icon-plus-sign icon-large"></i> Add Product</h4></center>
<hr>
<div id="ac">
<span>Name : </span><input type="text" style="width:265px; height:30px;" name="name" Required/><br>
<span>Buying Price : </span><input type="text" style="width:265px; height:30px;" name="buying_price" id="buying_price" /><br>
<script type="text/javascript">
                   $(document).ready(function() {
                   $('#buying_price').priceFormat();
                   });
                  </script>
<span>Retail Price : </span><input type="text" style="width:265px; height:30px;" name="retail_price" id="retail_price"/><br>
<script type="text/javascript">
                   $(document).ready(function() {
                   $('#retail_price').priceFormat();
                   });
                  </script>
<span>Wholesale Price : </span><input type="text" style="width:265px; height:30px;" name="wholesale_price" id="wholesale_price"/><br>
<script type="text/javascript">
                   $(document).ready(function() {
                   $('#wholesale_price').priceFormat();
                   });
                  </script>
<span>Category : </span><select name="category" class="select2" required="" style="width:265px; height:30px;" >
<option value=""></option>
@foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
</select><br>
<span>Supplier : </span><select name="supplier" class="select2" required="" style="width:265px; height:30px;" >
<option value=""></option>
@foreach($clients as $supplier)
                  <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                  @endforeach
</select><br>
<span>Expiry Date : </span><input type="date" style="width:265px; height:30px;" class="tcal tcalInput" name="expiry_date" ></input><br>
<span>Date Purchased : </span><input type="date" style="width:265px; height:30px;" class="tcal tcalInput" name="date" ></input><br>
<div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Save</button>
</div>
</div>
</form>