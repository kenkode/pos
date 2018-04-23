<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Item;
use App\Order;
use App\Orderitem;

class SalesController extends Controller
{
    //
    public function index(){
        if(Auth::user()->type == 'Admin'){
        $sales = Order::orderBy('id','DESC')->get();
        $bar = "view sales";
        return view('sales.index',compact('sales','bar'));
        }else{
        $bar = "reverse sales";
        $sales = Order::orderBy('id','DESC')->where('user_id',Auth::user()->id)->get();
        return view('sales.index',compact('sales','bar')); 
        }
    }

    public function reverseOrder(Request $request,$id){

        $order = Order::find($id);
        $order->status        = 1;
        $order->reversed_by   = Auth::user()->id;
        $order->update();

        if(Auth::user()->type == 'Admin'){
        return Redirect::to('/view/sales')->withFlashMessage('Order successfully reversed!');
        }else{
        return Redirect::to('/reverse/sales')->withFlashMessage('Order successfully reversed!');  
        }
    }

    public function returnOrder(Request $request,$id){

        $order = Order::find($id);
        $order->status        = 0;
        $order->returned_by   = Auth::user()->id;
        $order->update();

        if(Auth::user()->type == 'Admin'){
        return Redirect::to('/view/sales')->withFlashMessage('Order successfully returned!');
        }else{
        return Redirect::to('/reverse/sales')->withFlashMessage('Order successfully returned!');  
        }
    }

    public function show($id){
        $sale = Order::find($id);
        $orderitems = Orderitem::where('order_id',$id)->get();
        if(Auth::user()->type == 'Admin'){
        $bar = "view sales";
        }else{
        $bar = "reverse sales";  
        }
        return view('sales.show',compact('sale','orderitems','bar'));
    }

}
