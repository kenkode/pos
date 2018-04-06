<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Item;
use App\Client;

class ItemsController extends Controller
{
    //
    public function index(){
        $items = Item::orderBy('id','DESC')->get();
        $bar = "items";
        return view('products.index',compact('items','bar'));
    }

    public function create(){
        $bar = "categories";
        $categories = Category::all();
        $clients = Client::all();
        return view('products.create',compact('categories','clients','bar'));
    }

    public function store(Request $request){

        $itm = Item::orderBy('id','DESC')->first();
        $item = new Item;

        $item->name            = $request->name;
        if(count($itm) > 0){
        $item->code            = sprintf("%06d", $itm->code + 1);
        }else{
        $item->code            = sprintf("%06d", 1);
        }
        $item->buying_price    = str_replace(',','',$request->buying_price);
        $item->selling_price   = str_replace(',','',$request->selling_price);
        $item->client_id       = $request->supplier;
        $item->category_id     = $request->category;
        $item->expiry_date     = date('Y-m-d',strtotime(date('Y-m-d',strtotime($request->expiry_date))));
        $item->date            = date('Y-m-d',strtotime(date('Y-m-d',strtotime($request->date))));
        $item->user_id         = Auth::user()->id;
        $item->save();

        return Redirect::to('/products')->withFlashMessage('Product successfully created!');
    }

    public function show($id){
        $item = Item::find($id);
        $bar  = "items";
        return view('products.show',compact('item','bar'));
    }

    public function barcode($id){
        $item = Item::find($id);
        $bar  = "items";
        return view('products.barcode',compact('item','bar'));
    }

    public function displaybarcode(Request $request, $id){
        $item = Item::find($id);
        $copies = $request->copies;
        $bar  = "items";
        return view('products.displaybarcode',compact('item','bar','copies'));
    }

    public function edit($id){
        $product = Item::find($id);
        $bar = "items";
        $categories = Category::all();
        $clients = Client::all();
        return view('products.edit',compact('product','categories','clients','bar'));
    }

    public function update(Request $request,$id){
        $item = Item::find($id);

        $item->name            = $request->name;
        $item->buying_price    = $request->buying_price;
        $item->selling_price   = $request->selling_price;
        $item->client_id       = $request->supplier;
        $item->category_id     = $request->category;
        $item->expiry_date     = $request->expiry_date;
        $item->date            = $request->date;
        
        $item->update();

        return Redirect::to('/products')->withFlashMessage('Product successfully updated!');
    }

    public function destroy($id){
        Item::destroy($id);
        return Redirect::to('/products')->withFlashMessage('Product successfully deleted!');
    }

}
