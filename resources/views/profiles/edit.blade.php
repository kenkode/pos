<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
 <form role="form" method="POST" action="{{ url('/profile/update/'.$user->id) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <center><h4><i class="icon-plus-sign icon-large"></i> Update Profile</h4></center>
              <hr>
              <div id="ac">
              <span>Name : </span><input type="text" style="width:265px; height:30px;" value="{{$user->name}}" name="name" Required/><br>
              <span>Email : </span><input type="email" style="width:265px; height:30px;" value="{{$user->email}}" name="email" Required/><br>

              <div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Save</button>
</div>
</div>
            </form>
          