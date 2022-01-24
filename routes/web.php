<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\Order_detailsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Middleware\CheckLoginAdmin;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('home');
// })->name('home');
Route::middleware([CheckLoginAdmin::class])->prefix('admin')->group(function () {
    Route::resource('categories',CategoryController::class);
    Route::get('/search',[CategoryController::class, 'search'])->name('categories.search');
    Route::resource('foods',FoodsController::class);
    Route::get('/search',[FoodsController::class, 'search'])->name('foods.search');
    Route::resource('users',UsersController::class);
    Route::get('/search',[UsersController::class, 'search'])->name('users.search');
    Route::resource('orders',OrdersController::class);
    Route::get('/search',[OrdersController::class, 'search'])->name('orders.search');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::resource('order_details',Order_detailsController::class);
});
Route::prefix('client')->group(function(){
   Route::get('/home',[HomeController::class,"index"])->name('home.index');
   Route::post('/pay',[HomeController::class,"pay"])->name('home.pay');
   Route::get('/category/{id}',[HomeController::class,"categories"])->name('home.category');
   Route::get('/checkout',[HomeController::class,"checkout"])->name('home.checkout');
   Route::get('/login',[LoginController::class,'getLogin'])->name('admin.login');
   
   Route::post('/login',[LoginController::class,'postLogin'])->name('admin.postLogin');
   Route::get('/cart',[HomeController::class,'cart'])->name('cart');
   Route::get('/addtocart/{id}',[HomeController::class,'addToCart'])->name('addToCart');
   Route::post('/fixCartUser/{id}',[HomeController::class,'fixCartUser'])->name('fixCartUser');
   Route::get('/delelteCartUser/{id}',[HomeController::class,'delelteCartUser'])->name('delelteCartUser');
});


