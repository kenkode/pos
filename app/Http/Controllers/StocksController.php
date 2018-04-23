<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Item;
use App\Stock;

class StocksController extends Controller
{
    //
    public function index(){
        $stocks = Stock::orderBy('id','DESC')->get();
        $bar = "stocks";
        return view('stocks.index',compact('stocks','bar'));
    }

    public function create(){
        $bar = "stocks";
        $items = Item::all();
        return view('stocks.create',compact('items','bar'));
    }

    public function reorderCheck(){
        $items = Item::all();
        $data = array();
        foreach ($items as $item) {
          $check = Stock::check($item->id);
          if($check == 1){
            /*$data["message"] = "Stock for item ".$item->name." is almost out. ".Stock::stockRemaining($item->id)." item remaining";
            $data["status"]  = 1;*/
            array_push($data,array(
            "message"=>"Stock for item ".$item->name." is almost out. ".Stock::stockRemaining($item->id)." item remaining",
            "status"=>1
            ));

          }else{
           // $data["status"]  = 0;
            array_push($data,array(
            "status"=>0
            ));
          }
        }
        
        return json_encode($data);
    }

    public function store(Request $request){

        $stock = new Stock;

        $stock->item_id       = $request->item;
        $stock->quantity_in   = $request->quantity;
        $stock->date          = date('Y-m-d',strtotime(date('Y-m-d',strtotime($request->date))));
        $stock->user_id       = Auth::user()->id;
        $stock->save();

        return Redirect::to('/stocks')->withFlashMessage('Stock successfully added!');
    }

    public function show($id){
        $stock = Item::find($id);
        $bar  = "stocks";
        return view('stocks.show',compact('stock','bar'));
    }

    public function edit($id){
        $stock = Stock::find($id);
        $bar   = "stocks";
        $items = Item::all();
        return view('stocks.edit',compact('stock','items','bar'));
    }

    public function update(Request $request,$id){
        $stock = Stock::find($id);

        $stock->item_id       = $request->item;
        $stock->quantity_in   = $request->quantity;
        $stock->date          = date('Y-m-d',strtotime(date('Y-m-d',strtotime($request->date))));
        
        $stock->update();

        return Redirect::to('/stocks')->withFlashMessage('Stock successfully updated!');
    }

    public function destroy($id){
        Stock::destroy($id);
        return Redirect::to('/stocks')->withFlashMessage('Stock successfully deleted!');
    }

}
