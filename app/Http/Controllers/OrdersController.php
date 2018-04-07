<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderitem;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Item;
use App\Order;
use App\Stock;
use Session;

class OrdersController extends Controller
{
    //
    public function index(){
        $items = Item::all();
        $bar = "sales";
        Session::put('orderitems', []);

        $orderitems =Session::get('orderitems');
        return view('orders.index',compact('items','bar','orderitems'));
    }

    public function create(Request $request){
        $bar = "sales";
        $items = Item::all();
        $item = Item::findOrFail($request->item);

          $item_name = $item->name;
          $price = $item->selling_price;
          $quantity = $request->quantity;
          $item_id = $item->id;

           Session::push('orderitems', [
              'itemid' => $item_id,
              'item' => $item_name,
              'price' => $price,
              'quantity' => $quantity
            ]);

        $orderitems = Session::get('orderitems');
        return view('orders.index',compact('items','orderitems','bar'));
    }

    public function store(Request $request){

        $erporder = Session::get('erporder');

          $erporderitems = Session::get('orderitems');

          $count = Order::count();
          $order_number = date("Y/m/d/").str_pad($count+1, 4, "0", STR_PAD_LEFT);;
  
          
          $order = new Order;
          $order->order_no = $order_number;
          $order->date = date('Y-m-d');
          $order->amount = str_replace(',','',$request->payable);
          $order->tax = str_replace(',','',$request->tax);
          $order->amount_paid = str_replace(',','',$request->amount_paid);
          $order->payment_method = $request->payment_method;
          $order->transaction_no = $request->till_no;
          $order->user_id = Auth::user()->id;
          $order->save();
          
          foreach($erporderitems as $item){


            $itm = Item::findOrFail($item['itemid']);

            $ord = Order::findOrFail($order->id);

            $orderitem = new Orderitem;
            $orderitem->order_id = $order->id;
            $orderitem->item_id=$item['itemid'];
            $orderitem->price = $item['price'];
            $orderitem->quantity = $item['quantity'];
            $orderitem->save();


            $stock = new Stock;

            $stock->date = date("Y-m-d");
            $stock->order_id=$order->id;
            $stock->item_id=$item['itemid'];
            $stock->quantity_out = $item['quantity'];
            $stock->user_id = Auth::user()->id;
            $stock->save();
          }
 
        return Redirect::to('/sales')->withFlashMessage('Sale successfully completed!');
    }

    public function show($id){
        $item = Item::find($id);
        $bar  = "items";
        return view('products.show',compact('item','bar'));
    }

    public function edit($id){
        $editItem = Session::get('orderitems')[$id];
        $bar = "items";
        return view('orders.edit',compact('editItem','bar','id'));
    }

    public function update(Request $request,$sesItemID){
        $quantity = $request->qty;

          $ses = Session::get('orderitems');
          //unset($ses);
          $ses[$sesItemID]['quantity']=$quantity;
          Session::put('orderitems', $ses);

          $orderitems = Session::get('orderitems');
          $items = Item::all();
          $bar='sales';

          return view('orders.index', compact('items', 'orderitems','bar'));
    }

    public function remove($id){
        $items = Session::get('orderitems');
          unset($items[$id]);
          $newItems = array_values($items);
          Session::put('orderitems', $newItems);


          $orderitems = Session::get('orderitems');
          //dd($orderitems);
          $items = Item::all();
          $bar='sales';

          return view('orders.index', compact('items', 'orderitems','bar'));
    }

}
