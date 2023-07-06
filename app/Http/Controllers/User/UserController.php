<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function userPage(){
        return view('user.home');
    }

    function aboutPage(){
        return view('user.about');
    }

    function ajaxQuickView(Request $request){
        $quickView=Product::where('id',$request->id)->get();
        return response($quickView);
    }

    function useProfileEdit(Request $request){
        $user=User::where('id',$request->userId)->get()->toArray();
        if($request->File('profile_image')){
            if($user[0]['profile_image']){
                $oldImage=$user[0]['profile_image'];
                Storage::delete('public/images/profile_images/'.$oldImage);
            }
            $imageName= uniqid()."_".$request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->storeAs('public/images/profile_images',$imageName);

            user::where('id',$request->userId)->update([
                'profile_image'=>$imageName,
            ]);
        }else{
            User::where('id',$request->userId)->update([
                'phone'=>$request->phone,
                'address'=>$request->address,
                'name'=>$request->name,
            ]);
        }
        return redirect()->back();
    }
}
