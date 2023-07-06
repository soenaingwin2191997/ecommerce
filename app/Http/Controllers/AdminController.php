<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function adminPage(){
        $item=Item::all()->count();
        $porduct=Product::all()->count();
        $order=Order::where('status','Accept')->get()->count();
        $user=User::where('role','user')->get()->count();
        $adminList=User::where('role','admin')->get();
        return view('admin.dashboard',[
            'item'=>$item,
            'product'=>$porduct,
            'order'=>$order,
            'user'=>$user,
            'adminList'=>$adminList,
        ]);
    }
}
