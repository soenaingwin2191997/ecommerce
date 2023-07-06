<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    function orderPage(){
        $orders=Order::join('products','product_id','products.id')->where('user_id',Auth::user()->id)->get();
        return view('user.order',['orders'=>$orders]);
    }

    function ajaxAddOrder(Request $request){
        foreach($request->order as $order){
            Order::create($order);
        }
        Cart::where('user_id',Auth::user()->id)->delete();
    }

    // For Admin--------------------------------------------------
    function adminOrderPage(){
        $orders=Order::select('*','orders.id as order_id')->join('products','product_id','products.id')->orderBy('orders.id','DESC')->get();
        return view('admin.admin-order',['orders'=>$orders,'status'=>'All']);   
    }

    function adminOrderStatus($status){
        if($status=='All'){
            return redirect('admin/order/page');
        }else{
            $orders=Order::select('*','orders.id as order_id')->join('products','product_id','products.id')->where('status',$status)->orderBy('orders.id','DESC')->get();
            return view('admin.admin-order',['orders'=>$orders,'status'=>$status]);
        }
    }

    function orderStatusChange($status,$id){
        Order::where('id',$id)->update([
            'status'=>$status,
        ]);
        return redirect()->back();
    }
}
