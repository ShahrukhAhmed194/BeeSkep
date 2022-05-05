<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\UserController;
use App\HTTP\Controllers\ProductController;
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

Route::get('/signin', function () {
    return view('login');
})->name('signin');

Route::view("register", 'register')->name('register_view');

Route::post("login", [UserController::class,'login'])->name('login');
Route::post("user/register", [UserController::class,'register'])->name('register');
Route::get("/logout", [UserController::class,'logout'])->name('logout');
Route::get("/home", [ProductController::class,'index'])->name('home');
Route::get("detail/{id}", [ProductController::class,'detail']);
Route::get("search", [ProductController::class,'search'])->name('search');
Route::post("add/to_cart", [ProductController::class,'addToCart'])->name('add_to_cart');
Route::get("cart/list", [ProductController::class,'showCartList'])->name('cart_list');
Route::get("remove/cart/{id}", [ProductController::class,'removeCart'])->name('remove_cart');
Route::get("order/now", [ProductController::class,'OrderNow'])->name('order_now');
Route::post("place/order", [ProductController::class,'placeOrder'])->name('place_order');
Route::get("my/orders", [ProductController::class,'myOrders'])->name('my_orders');
