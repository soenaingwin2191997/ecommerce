<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function cartPage(){
        $cart=Cart::join('products','product_id','=','products.id')->where('user_id',Auth::user()->id)->get();
        $finalTotal=0;
        foreach($cart as $c){
            $finalTotal+=$c->discount_price? $c->discount_price : $c->normal_price;
        }
        return view('user.cart',['carts'=>$cart,'finalTotal'=>$finalTotal]);
    }

    function ajaxUserAddToCart(Request $request){
        Cart::insert([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->product_id,
        ]);
    }

    function deleteCart($id){
        Cart::where('product_id',$id)->delete();
        return redirect()->back();
    }

    function clearCart(){
        Cart::where('user_id',Auth::user()->id)->delete();
        return redirect()->back();
    }
}
