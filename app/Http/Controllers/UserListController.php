<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    function userListPage(){
        $users=User::where('role','user')->get();
        return view('admin.user-list',['users'=>$users]);
    }
}
