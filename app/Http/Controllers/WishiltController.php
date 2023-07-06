<?php

namespace App\Http\Controllers;

use App\Models\Wishilt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishiltController extends Controller
{
    function addToWishlist(Request $request){
        Wishilt::create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->product_id,
        ]);
    }

    function wishiltPage(){
        $wishilts=Wishilt::select('*','wishilts.id as wishilt_id','products.id as product_id')->join('products','product_id','products.id')->where('user_id',Auth::user()->id)->orderBy('wishilt_id','DESC')->get();
        return view('user.wishilt',['wishilts'=>$wishilts]);
    }

    function wishiltDelete($id){
        Wishilt::where('id',$id)->delete();
        return redirect()->back()->with('message','Remove Wishilt Successful!');
    }
}
