<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ShopController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/',function (){
 //  return view('front.index') ;
  //return \App\Models\Blog::all();
  //  return \App\Models\Product::find(1)->brand;
//});

//Route::get('/',function (\App\Repositories\Product\ProductRepositoryInterface $productRepository){
//   return $productRepository->all();
//});
//Route::get('/',function (\App\Service\Product\ProductServiceInterface $productService){
//   return $productService->find(2);
//});
// trang chủ
Route::get('/',[\App\Http\Controllers\Front\HomeController::class,'index']);

//sản phẩm chi tiết
Route::get('shop/product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'show']);
//đăng comment
Route::post('shop/product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'postComment']);
//trang sản phẩm
Route::get('shop',[\App\Http\Controllers\Front\ShopController::class,'index']);
Route::get('shop/category/{categoryName}',[\App\Http\Controllers\Front\ShopController::class,'category']);
//trang shop cart
Route::prefix('/cart')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CartController::class,'index']);
    Route::get('add',[\App\Http\Controllers\Front\CartController::class,'add']);
    Route::get('delete',[\App\Http\Controllers\Front\CartController::class,'delete']);

    Route::get('update',[\App\Http\Controllers\Front\CartController::class,'update']);
});

//trang checkout
Route::prefix('/checkout')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CheckoutController::class,'index']);
    Route::post("/",[\App\Http\Controllers\Front\CheckoutController::class,"placeOrder"]);
    Route::post("/update-total",[\App\Http\Controllers\Front\CheckoutController::class,"updateTotal"]);
    Route::get("/thank-you/",[\App\Http\Controllers\Front\CheckoutController::class,"thankYou"]);
    Route::get('/success-transaction/{order}', [\App\Http\Controllers\Front\CheckoutController::class, 'successTransaction'])->name('successTransaction');
    Route::get('/cancel-transaction/{order}', [\App\Http\Controllers\Front\CheckoutController::class, 'cancelTransaction'])->name('cancelTransaction');
});

//trang blog
Route::prefix('/blog')->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\BlogController::class,'index']);
    Route::get('/{slug}',[\App\Http\Controllers\Front\BlogController::class,'blogDetail']);
});

//trang contacts
Route::get('contact',[\App\Http\Controllers\Front\ContactsController::class,'index']);

//Account
Route::prefix('account')->group(function () {
    Route::get('login',[\App\Http\Controllers\Front\AccountController::class,'login']);
    Route::post('login',[\App\Http\Controllers\Front\AccountController::class,'checkLogin']);
    Route::get('logout',[\App\Http\Controllers\Front\AccountController::class,'logout']);
    Route::get('register',[\App\Http\Controllers\Front\AccountController::class,'register']);
    Route::post('register',[\App\Http\Controllers\Front\AccountController::class,'postRegister']);


    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function (){
        Route::get('/',[\App\Http\Controllers\Front\AccountController::class,'myOrder']);
        Route::get('/{orderCode}',[\App\Http\Controllers\Front\AccountController::class,'orderDetail']);
    });
});

//dashboard(Admin)
Route::prefix('/admin')->group(function (){
    Route::resource('user',\App\Http\Controllers\Admin\UserController::class);
});
