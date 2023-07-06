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




Route::prefix("/shop")->group(function () {
    Route::get('/',[\App\Http\Controllers\Front\ShopController::class,'index']);
    Route::get('/product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'show']);
    Route::post('/product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'postComment']);
    Route::get('/category/{categoryName}',[\App\Http\Controllers\Front\ShopController::class,'category']);
});



//trang shop cart
Route::prefix('shop')->group(function (){
    //sản phẩm chi tiết
    Route::get('product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'show']);
//đăng comment
    Route::post('product/{slug}',[\App\Http\Controllers\Front\ShopController::class,'postComment']);
//trang sản phẩm
    Route::get('',[\App\Http\Controllers\Front\ShopController::class,'index']);
    Route::get('category/{categoryName}',[\App\Http\Controllers\Front\ShopController::class,'category']);
});
Route::prefix('/cart')->group(function (){
    Route::get('/',[\App\Http\Controllers\Front\CartController::class,'index']);
//    Route::get('add',[\App\Http\Controllers\Front\CartController::class,'add']);
    Route::get('add', [\App\Http\Controllers\Front\CartController::class, 'add'])->name('cart.add');

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
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function (){
    Route::redirect('','admin/dashboard');

//xử lý route category
    Route::prefix('category')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\ProductCategoryController::class,'index']);
        Route::get('create',[\App\Http\Controllers\Admin\ProductCategoryController::class,'create']);
        Route::post('store',[\App\Http\Controllers\Admin\ProductCategoryController::class,'store']);
        Route::post('action',[\App\Http\Controllers\Admin\ProductCategoryController::class,'action']);
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\ProductCategoryController::class,'edit'])->name('category.edit');
        Route::post('edit/update/{id}',[\App\Http\Controllers\Admin\ProductCategoryController::class,'update'])->name('category.update');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\ProductCategoryController::class,'delete'])->name('delete_category');

    });

//xử lý route user
    Route::prefix('user')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\UsersController::class,'index']);
        Route::get('show/{id}',[\App\Http\Controllers\Admin\UsersController::class,'show'])->name('user.show');
        Route::get('create',[\App\Http\Controllers\Admin\UsersController::class,'create']);
        Route::post('store',[\App\Http\Controllers\Admin\UsersController::class,'store']);
        Route::post('action',[\App\Http\Controllers\Admin\UsersController::class,'action']);
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\UsersController::class,'edit'])->name('user.edit');
        Route::post('edit/update/{id}',[\App\Http\Controllers\Admin\UsersController::class,'update'])->name('user.update');
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\UsersController::class,'delete'])->name('delete_user');
    });

    Route::get('dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index']);
    Route::get('orders',[\App\Http\Controllers\Admin\OrdersController::class,'index']);

// xử lý route login
    Route::prefix('login')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\HomeController::class,'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('',[\App\Http\Controllers\Admin\HomeController::class,'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });
    Route::get('logout',[\App\Http\Controllers\Admin\HomeController::class,'logout']);
});

