<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    function itemPage(){
        $category=Category::all();
        $item=Item::all();
        return view('admin.item',['categories'=>$category,'item'=>$item]);
    }

    function addItem(Request $request){
        Item::create([
            'category_id'=>$request->category_id,
            'item_name'=>$request->item_name,
        ]);
        return redirect()->back()->with('message','Item Add Successful!');
    }

    function deleteItem($id){
        Item::find($id)->delete();
        return redirect()->back()->with('message','Item Delete Successful!');
    }

    // For Ajax
    function ajaxCategoryChange(Request $request){
        if($request->id=='all'){
            $item=Item::all();
        }else{
            $item=Item::where('category_id',$request->id)->get();
        }
        return response($item);
    }
}
