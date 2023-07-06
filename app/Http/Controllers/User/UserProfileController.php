<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    function userProfilePage(){
        return view('user.user-profile');
    }

    function userEditProfilePage($id){
        $user=User::where('id',$id)->get()->toArray();
        return view('user.user-edit-profile',['user'=>$user]);
    }
}
