<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function home(){
       if(Auth::user()){
            if(Auth::user()->role == 'user'){
                return view('user.home');
            }elseif(Auth::user()->role=='admin'){
                return redirect('admin/page');
            }
       }else{
            return view('auth.login');
       }
    }

    function authPage(){
        if(Auth::user()){
            if(Auth::user()->role =='admin'){
                return redirect('admin/page');
            }else{
                return view('user.home');
            }
        }else{
            return view('user.home');
        }
    }
}
