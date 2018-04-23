<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Item;
use App\Client;
use App\User;
use App\Stock;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bar = "dashboard";
        $sales = Order::count();
        $products = Item::count();
        $suppliers = Client::count();
        $users = User::count();
        return view('home',compact('bar','sales','products','suppliers','users'));
    }

}
