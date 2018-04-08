
@extends('layouts.main')
@section('content')

<style type="text/css">
  #imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-image:url("{{asset('public/uploads/logo/'.$organization->logo) }}");
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
</style>


<script type="text/javascript">
  $(document).ready(function(){
  $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
            }
    });
  });
</script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Organization
        <small>Show</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Organization</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <!-- small box -->
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Organization</h3>
              @if (Session::has('flash_message'))

            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            {{ Session::get('flash_message') }}
           </div>
          @endif

           @if (Session::has('delete_message'))

            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            {{ Session::get('delete_message') }}
           </div>
          @endif
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('/organizations/update/'.$organization->id) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body col-xs-12" style="background: #fff">
                <p style="color: red">Please fill in the fields in *</p>
              
              <div class="col-xs-6">
              <div class="form-group">
                  <label for="exampleInputFile">Photo</label>
                  <input type="file" id="uploadFile" name="image"><br>
                  <div id="imagePreview"></div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Organization Name <span style="color: red">*</span></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Organization Name" value="{{$organization->name}}" name="name" required="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Phone </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Organization Phone" value="{{$organization->phone}}" name="phone" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Organization Email </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Organization Email" value="{{$organization->email}}" name="email" >
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Organization Address </label>
                  <textarea class="form-control" name="address" rows="3" placeholder="Enter Organization Address...">{{$organization->address}}</textarea>
                </div>

                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
            </form>
          <!-- /.box -->
        </div>
        
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
  @stop
