<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Item;

class CategoriesController extends Controller
{
    //
    public function index(){
        $categories = Category::orderBy('id','DESC')->get();
        $bar = "categories";
        return view('categories.index',compact('categories','bar'));
    }

    public function create(){
        $bar = "categories";
        $categories = Category::all();
        return view('categories.create',compact('categories','bar'));
    }

    public function store(Request $request){

        $category = new Category;

        $category->name     = $request->name;
        $category->user_id  = Auth::user()->id;
        $category->save();

        return Redirect::to('/categories')->withFlashMessage('Category successfully created!');
    }

    public function show($id){
        $category = Category::find($id);
        $bar  = "categories";
        return view('categories.show',compact('category','bar'));
    }

    public function edit($id){
        $category = Category::find($id);
        $bar = "categories";
        return view('categories.edit',compact('category','bar'));
    }

    public function update(Request $request,$id){
        $category = Category::find($id);

        $category->name     = $request->name;
        
        $category->update();

        return Redirect::to('/categories')->withFlashMessage('Category successfully updated!');
    }

    public function destroy($id){
        $items = Item::where('category_id',$id)->count();
        if($items > 0){
        return Redirect::to('/categories')->withDeleteMessage('That category cannot be deleted because it`s linked to an item!');
        }else{
        Category::destroy($id);
        return Redirect::to('/categories')->withFlashMessage('Category successfully deleted!');
    }
    }

}
