<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function categoryPage(){
        $category=Category::orderBy('id','DESC')->get();
        return view('admin.category',['category'=>$category]);
    }

    //Add Category
    function addCategory(Request $request){
        Category::create([
            'category_name'=>$request->category_name,
        ]);
        return redirect()->back()->with('message','Category Add Successful!');
    }

    //Delete Category
    function deleteCategory($id){
        Category::find($id)->delete();
        return redirect()->back()->with('message','Category Delete Successful!');
    }
}
