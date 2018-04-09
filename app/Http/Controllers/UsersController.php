<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Personnel;
use Redirect;
use Entrust;
use App\Audit;

class UsersController extends Controller
{
    //
    public function index(){
        $users = User::where('status',1)->orderBy('id','DESC')->get();
        $bar = "users";
        return view('users.index',compact('users','bar'));
    }

    public function create(){
    	$bar = "users";
    	return view('users.create',compact('bar'));
    }

    public function store(Request $request){

        $user = new User;

		$user->name            = $request->name;
        $user->email           = $request->email;
        $user->password        = bcrypt("123456");
        $user->status          = 1;
        $user->type            = $request->role;
        $user->remember_token  = bcrypt(uniqid(rand(), true));

		$user->save();

        return Redirect::to('users')->withFlashMessage('User successfully created!');
	}

	public function show($id){
        $user = User::find($id);
        $bar = "users";
    	return view('users.show',compact('user','bar'));
    }

	public function edit($id){
    	$user = User::find($id);
        $bar = "users";
        return view('users.edit',compact('user','bar'));
    }

    public function update(Request $request,$id){
        $date = strtotime(date('Y-m-d',strtotime($request->date)));
        date('Y-m-d',$date);

    	$user = User::find($id);

        $user->name            = $request->name;
        $user->email           = $request->email;
        $user->type            = $request->role;

		$user->update();

        return Redirect::to('users')->withFlashMessage('User successfully updated!');
    }

    public function deactivate($id){
    	$user = User::find($id);
    	$user->status = 0;
    	$user->update();
        return Redirect::to('users')->withFlashMessage('User successfully deactivated!');
    }

    public function activate(Request $request, $id){
        
    	$user = User::find($id);
    	$user->status = 1;
    	$user->update();

        return Redirect::to('users/inactives')->withFlashMessage('User successfully activated!');
    }

    public function inactives(){
        $users = User::where('status',0)->get();
        $bar = "inactive users";
        return view('users.inactives',compact('users','bar'));
    }

}
