<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index(){
        $user = User::where('id',Auth::user()->id)->first();
        $bar = "profile";
        
    	return view('profiles.index',compact('user','bar'));
    }

    
	public function edit(){
        $user = User::find(Auth::user()->id);
        $bar = "profile";
        
        return view('profiles.edit',compact('user','bar'));
    }

    public function editpassword(){
        $user = User::find(Auth::user()->id);
        $bar = "profile";
        
        return view('profiles.editpassword',compact('user','bar'));
    }

    public function update(Request $request,$id){
        $date = strtotime(date('Y-m-d',strtotime($request->date)));
        date('Y-m-d',$date);

    	$user = User::find($id);
        $user->name            = $request->name;
        $user->email           = $request->email;

		$user->update();

        return Redirect::to('profile')->withFlashMessage('User details successfully updated!');
    }

    public function updatepassword(Request $request,$id){
        
        $user = User::find(Auth::user()->id);
       
        $password_confirmation = $request->password_confirmation;
        $password = $request->password;

        if (!password_verify($request->oldpassword, $user->password)){

            return Redirect::back()->with('error', 'old password does not match your current password');
        }
        else if($password != $password_confirmation){

            return Redirect::back()->with('error', 'passwords do not match');
        }  
        else
        {

        $user->password = bcrypt($request->password);

        $user->update();

        return Redirect::to('profile')->withFlashMessage('User password successfully updated!');
    }
    }

}
