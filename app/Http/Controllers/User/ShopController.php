<?php

namespace App\Http\Controllers\User;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    function shopPage(){
        $categories=Category::all();
        $porducts=Product::inRandomOrder()->paginate(12);
        $allProduct=Product::all()->count();
        $order=Order::where('user_id',Auth::user()->id)->get()->count();
        $cart=Cart::where('user_id',Auth::user()->id)->get()->count();
        if($allProduct > 5){
            $shopNewProduct=Product::inRandomOrder()->limit(5)->get();
        }else{
            $shopNewProduct=Product::inRandomOrder()->limit($allProduct)->get();
        }
        return view('user.shop',[
            'products'=>$porducts,
            'categories'=>$categories,
            'allProduct'=>$allProduct,
            'shopNewProduct'=>$shopNewProduct,
            'order'=>$order,
            'cart'=>$cart,
        ]);
    }

    // For Search Product
    function searchProduct(Request $request){
        $categories=Category::all();
        $porducts=Product::select('*','products.id as id','items.id as item_id')
                ->join('items','products.item_id','items.id')->where('product_name', 'like', "%{$request->searchId}%")
                ->orWhere('item_name', 'like', "%{$request->searchId}%")
                ->orWhere('product_image','like',"%{$request->searchId}%")
                ->paginate(12);
        $allProduct=$porducts->count();
        $order=Order::where('user_id',Auth::user()->id)->get()->count();
        $cart=Cart::where('user_id',Auth::user()->id)->get()->count();
        if($allProduct > 5){
            $shopNewProduct=Product::inRandomOrder()->limit(5)->get();
        }else{
            $shopNewProduct=Product::inRandomOrder()->limit($allProduct)->get();
        }
        return view('user.shop',[
            'products'=>$porducts,
            'categories'=>$categories,
            'allProduct'=>$allProduct,
            'shopNewProduct'=>$shopNewProduct,
            'order'=>$order,
            'cart'=>$cart,
        ]);
    }

    function shopCategory($id){
        $count=Product::all()->count();
        $categories=Category::all();
        $order=Order::where('user_id',Auth::user()->id)->get()->count();
        $cart=Cart::where('user_id',Auth::user()->id)->get()->count();
        $porducts=Product::where('category_id',$id)->orderBy('id','DESC')->paginate(12);
        $allProduct=$porducts->count();
        if($count > 5){
            $shopNewProduct=Product::inRandomOrder()->limit(5)->get();
        }else{
            $shopNewProduct=Product::inRandomOrder()->limit($count)->get();
        }
        return view('user.shop',[
            'products'=>$porducts,
            'categories'=>$categories,
            'allProduct'=>$allProduct,
            'shopNewProduct'=>$shopNewProduct,
            'order'=>$order,
            'cart'=>$cart,
        ]);
    }


    function shopItem($id){
        $count=Product::all()->count();
        $categories=Category::all();
        $order=Order::where('user_id',Auth::user()->id)->get()->count();
        $cart=Cart::where('user_id',Auth::user()->id)->get()->count();
        $porducts=Product::where('item_id',$id)->orderBy('id','DESC')->paginate(12);
        $allProduct=$porducts->count();
        if($count > 5){
            $shopNewProduct=Product::inRandomOrder()->limit(5)->get();
        }else{
            $shopNewProduct=Product::inRandomOrder()->limit($count)->get();
        }
        return view('user.shop',[
            'products'=>$porducts,
            'categories'=>$categories,
            'allProduct'=>$allProduct,
            'shopNewProduct'=>$shopNewProduct,
            'order'=>$order,
            'cart'=>$cart,
        ]);
    }

    ///  For Shop Detail  //////////////////////////////////
    function shopDetail($id){
        $product=Product::where('id',$id)->get()->toArray();
        $productItem=Item::where('id',$product[0]['item_id'])->get()->toArray();
        $categories=Category::all();
        $commentCount=Comment::where('user_id',Auth::user()->id)->where('product_id',$id)->count();
        $comment=Comment::join('users','user_id','users.id')->where('user_id',Auth::user()->id)->where('product_id',$id)->get();
        // For Related Product ----------------------------------
        $itemId=$product[0]['item_id'];
        $item=Item::where('id',$itemId)->get()->toArray();
        $detailRelated=Product::where('item_id',$itemId)->get();
        $count=$detailRelated->count();
        if($count > 8){
            $detailRelated=Product::where('item_id',$itemId)->inRandomOrder()->limit(8)->get();
        }else{
            $detailRelated=Product::where('item_id',$itemId)->inRandomOrder()->limit($count)->get();
        }

        // For New Product For User Detail------------------------------------
        $newProductCount=Product::all()->count();
        if($newProductCount > 5){
            $newProduct=Product::inRandomOrder()->limit(5)->get();
        }else{
            $newProduct=Product::inRandomOrder()->limit($newProductCount)->get();
        }

        return view('user.detail',[
            'product'=>$product,
            'categories'=>$categories,
            'detailRelated'=>$detailRelated,
            'newProduct'=>$newProduct,
            'item'=>$item,
            'productItem'=>$productItem,
            'comment'=>$comment,
            'commentCount'=>$commentCount,
        ]);
    }

    // For View Count
    function ajaxUserProductDetail(Request $request){
        $count=Product::where('id',$request->product_id)->get()->toArray();
        $count=$count[0]['view_count'];
        Product::where('id',$request->product_id)->update([
            'view_count'=> $count + 1,
        ]);
    }
}
