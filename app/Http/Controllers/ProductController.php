<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // For Show Product----------------------------------------
    function showProductPage(){
        $categories=Category::all();
        $items=Item::all();
        $products=Product::orderBy('id','DESC')->get();
        return view('admin.show-product',['products'=>$products,'categories'=>$categories,'items'=>$items]);
    }

    function detailProduct($id){
        $categories=Category::all();
        $items=Item::all();
        $product=Product::where('id',$id)->get()->toArray();
        return view('admin.detail-product',['product'=>$product,'categories'=>$categories,'items'=>$items]);
    }

    function deleteProduct($id){
        Product::where('id',$id)->delete();
        return redirect()->back()->back()->with('message','Delete Product Successful!');
    }

    function ajaxShowProductCategory(Request $request){
        if($request->id=="0"){
            $items=Item::all();
            $products=Product::orderBy('id','DESC')->get();
        }else{
            $items=Item::where('category_id',$request->id)->get();
            $products=Product::where('category_id',$request->id)->orderBy('id','DESC')->get();
        }
        return response([$items,$products]);
    }

    function ajaxShowProductItem(Request $request){
        if($request->id=='0'){
            $products=product::orderBy('id','DESC')->get();
        }else{
            $products=Product::where('item_id',$request->id)->orderBy('id','DESC')->get();
        }
        return response($products);
    }

    // Update Product and Delete Old Image , Save Image
    function updateProduct(Request $request){
        $product=Product::where('id',$request->product_id)->get()->toArray();
        if($request->file('product_image')){
            if($product[0]['product_image']){
                $oldImage=$product[0]['product_image'];
                Storage::delete('public/images/product_images/'.$oldImage);
            }
            $imageName= uniqid()."_".$request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs('public/images/product_images',$imageName);

            Product::where('id',$request->product_id)->update([
                'product_image'=>$imageName,
            ]);
        }
        Product::where('id',$request->product_id)->update([
            'category_id'=>$request->category_id,
            'item_id'=>$request->item_id,
            'product_name'=>$request->product_name,
            'normal_price'=>$request->normal_price,
            'discount_price'=>$request->discount_price,
            'des1'=>$request->des1,
            'des2'=>$request->des2,
            'des3'=>$request->des3,
            'des4'=>$request->des4,
            'des5'=>$request->des5,
            'des6'=>$request->des6,
            'long_des'=>$request->long_des,
        ]);
        return redirect()->back()->with('message','Product Update Successful!');
    }

    // For Add Product----------------------------------------------
    function addProductPage(){
        $categories=Category::all();
        $items=Item::all();
        return view('admin.add-product',['categories'=>$categories,'items'=>$items]);
    }

    function ajaxAddProductCategory(Request $request){
        if($request->id=="0"){
            $items=Item::all();
        }else{
            $items=Item::where('category_id',$request->id)->get();
        }
        return response($items);
    }

    function addProduct(Request $request){
        $data=$this->formData($request);
        if($request->file('product_image')){
            $imageName= uniqid()."_".$request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs('public/images/product_images',$imageName);
            $data['product_image']=$imageName;
        }
        Product::create($data);
        return redirect()->back()->with('message','Product Add Successful!');
    }

    private function formData($request){
        return[
            'category_id'=>$request->category_id,
            'item_id'=>$request->item_id,
            'product_name'=>$request->product_name,
            'normal_price'=>$request->normal_price,
            'discount_price'=>$request->discount_price,
            'des1'=>$request->des1,
            'des2'=>$request->des2,
            'des3'=>$request->des3,
            'des4'=>$request->des4,
            'des5'=>$request->des5,
            'des6'=>$request->des6,
            'long_des'=>$request->long_des,
            'product_image'=>$request->product_image,
        ];
    }
}
