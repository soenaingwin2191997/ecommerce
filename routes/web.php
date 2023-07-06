<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\WishiltController;
use Illuminate\Support\Facades\Route;

route::get('/',[HomeController::class,'authPage']);


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/home',[HomeController::class,'home']);


// For Admin
route::group(['middleware'=>'admin_middleware'],function(){
    route::get('admin/page',[AdminController::class,'adminPage']);
    route::get('category/page',[CategoryController::class,'categoryPage']);
    route::post('add/category',[CategoryController::class,'addCategory']);
    route::get('delete/category/{id}',[CategoryController::class,'deleteCategory']);

    route::get('item/page',[ItemController::class,'itemPage']);
    route::post('add/item',[ItemController::class,'addItem']);
    route::get('delete/item/{id}',[ItemController::class,'deleteItem']);
    route::get('ajax/category/change',[ItemController::class,'ajaxCategoryChange']);

    route::get('add/product/page',[ProductController::class,'addProductPage']);
    route::post('add/product',[ProductController::class,'addProduct']);
    route::get('ajax/add-product/category',[ProductController::class,'ajaxAddProductCategory']);
    route::get('show-product/page',[ProductController::class,'showProductPage']);
    route::get('detail/product/{id}',[ProductController::class,'detailProduct']);
    route::get('delete/product/{id}',[ProductController::class,'deleteProduct']);
    route::post('update/product',[ProductController::class,'updateProduct']);
    route::get('ajax/show-product/category',[ProductController::class,'ajaxShowProductCategory']);
    route::get('ajax/show-product/item',[ProductController::class,'ajaxShowProductItem']);

    route::get('admin/order/page',[OrderController::class,'adminOrderPage']);
    route::get('order/status/change/{Status}/{id}',[OrderController::class,'orderStatusChange']);
    route::get('admin/order/{status}',[OrderController::class,'adminOrderStatus']);

    route::get('user-list/page',[UserListController::class,'userListPage']);

});

// For User
route::group(['middleware'=>'user_middleware'],function(){
    route::get('user/page',[UserController::class,'userPage']);

    route::post('comment/add',[CommentController::class,'commentAdd']);
    route::get('wishilt/page',[WishiltController::class,'wishiltPage']);
    route::get('ajax/user/addtowishlist',[WishiltController::class,'addToWishlist']);
    route::get('wishilt/delete/{id}',[WishiltController::class,'wishiltDelete']);

    route::get('shop/page',[ShopController::class,'shopPage']);
    route::get('shop/category/{id}',[ShopController::class,'shopCategory']);
    route::get('shop/item/{id}',[ShopController::class,'shopItem']);
    route::get('shop/detail/{id}',[ShopController::class,'shopDetail']);
    route::get('ajax/user/product/detail',[ShopController::class,'ajaxUserProductDetail']);
    route::get('search/product',[ShopController::class,'searchProduct']);

    route::get('cart/page',[CartController::class,'cartPage']);
    route::get('ajax/user/addtocart',[CartController::class,'ajaxUserAddToCart']);
    route::get('delete/cart/{id}',[CartController::class,'deleteCart']);
    route::get('clear/cart',[CartController::class,'clearCart']);

    route::get('order/page',[OrderController::class,'orderPage']);
    route::get('ajax/add/order',[OrderController::class,'ajaxAddOrder']);

    route::get('about/page',[UserController::class,'aboutPage']);
    route::get('ajax/quick-view/user',[UserController::class,'ajaxQuickView']);
    route::post('user/profile/edit',[UserController::class,'useProfileEdit']);

    route::get('user-profile/page',[UserProfileController::class,'userProfilePage']);
    route::get('user-edit-profile/page/{id}',[UserProfileController::class,'userEditProfilePage']);


});

});
