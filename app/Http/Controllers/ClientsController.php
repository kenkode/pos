<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Client;
use App\Item;

class ClientsController extends Controller
{
    //
    public function index(){
        $clients = Client::orderBy('id','DESC')->get();
        $bar = "clients";
        return view('clients.index',compact('clients','bar'));
    }

    public function create(){
        $bar = "clients";
        return view('clients.create',compact('bar'));
    }

    public function store(Request $request){

        $client = new Client;

        $client->name       = $request->name;
        $client->phone      = $request->phone;
        $client->address    = $request->address;
        $client->email      = $request->email;
        $client->user_id    = Auth::user()->id;
        $client->save();

        return Redirect::to('/suppliers')->withFlashMessage('Client successfully created!');
    }

    public function show($id){
        $client = Client::find($id);
        $bar  = "clients";
        return view('clients.show',compact('client','bar'));
    }

    public function edit($id){
        $client = Client::find($id);
        $bar = "clients";
        return view('clients.edit',compact('client','bar'));
    }

    public function update(Request $request,$id){
        $client = Client::find($id);

        $client->name       = $request->name;
        $client->phone      = $request->phone;
        $client->address    = $request->address;
        $client->email      = $request->email;
        
        $client->update();

        return Redirect::to('/suppliers')->withFlashMessage('Client successfully updated!');
    }

    public function destroy($id){
        $items = Item::where('client_id',$id)->count();
        if($items > 0){
        return Redirect::to('/suppliers')->withDeleteMessage('That client cannot be deleted because he/she is linked to an item!');
        }else{
        Client::destroy($id);
        return Redirect::to('/suppliers')->withFlashMessage('Client successfully deleted!');
    }
    }

}
