<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class CommentController extends Controller
{
    function commentAdd(Request $request){
        Comment::create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->productId,
            'comment'=>$request->comment,
        ]);
        return redirect()->back()->with('message','Add Comment Successful!');
    }
}
