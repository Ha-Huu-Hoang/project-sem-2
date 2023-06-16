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
Route::get('shop/product/{id}',[\App\Http\Controllers\Front\ShopController::class,'show']);
//đăng comment
Route::post('shop/product/{id}',[\App\Http\Controllers\Front\ShopController::class,'postComment']);
//trang sản phẩm
Route::get('shop',[\App\Http\Controllers\Front\ShopController::class,'index']);
Route::get('shop/category/{categoryName}',[\App\Http\Controllers\Front\ShopController::class,'category']);
//trang shop cart
Route::prefix('/cart')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CartController::class,'index']);
    Route::get('/add/{id}',[\App\Http\Controllers\Front\CartController::class,'add']);
    Route::get('/delete/{id}',[\App\Http\Controllers\Front\CartController::class,'delete']);
});

//trang checkout
Route::prefix('/checkout')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CheckoutController::class,'index']);
    Route::post("/",[\App\Http\Controllers\Front\CheckoutController::class,"placeOrder"]);
    Route::get("/thank-you/{order}",[\App\Http\Controllers\Front\CheckoutController::class,"result"]);
    Route::get('/success-transaction/{order}', [\App\Http\Controllers\Front\CheckoutController::class, 'successTransaction'])->name('successTransaction');
    Route::get('/cancel-transaction/{order}', [\App\Http\Controllers\Front\CheckoutController::class, 'cancelTransaction'])->name('cancelTransaction');
});

//trang blog
Route::get('blog',[\App\Http\Controllers\Front\BlogController::class,'index']);

//trang contacts
Route::get('contact',[\App\Http\Controllers\Front\ContactsController::class,'index']);

