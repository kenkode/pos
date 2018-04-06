<link href="{{asset('public/style.css')}}" media="screen" rel="stylesheet" type="text/css" />
 
            <form role="form" method="POST" action="{{ url('/profile/updatepassword/'.$user->id) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <center><h4><i class="icon-plus-sign icon-large"></i> Update Password</h4></center>
              <hr>
              <div id="ac">
              <span>Current Password : </span><input type="password" style="width:265px; height:30px;" name="oldpassword" Required/><br>
              <span>New Password : </span><input type="password" style="width:265px; height:30px;" name="password" Required/><br>
              <span>Confirm Password : </span><input type="password" style="width:265px; height:30px;" name="password_confirmation" Required/><br>
                
              <div style="float:right; margin-right:0px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="fa fa-save fa-large"></i> Save</button>
</div>
</div>
            </form>