<?php

use App\Http\Controllers\Front\Auth\AuthController;
use App\Http\Controllers\Front\Carts\CartController;
use App\Http\Controllers\Front\Categories\CategoryFrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Home\HomeController;
use App\Http\Controllers\Front\Orders\OrderFrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

# Front Routes

Route::get('/', [HomeController::class, 'index'])->name('front.products.index');


Route::get('/dashboard', function() {
    return view('dashboard.index');
});

Route::get('local',function (){
    session(['local'=>request('local')]);
    return redirect('/');
});

Route::get('/category/{category}', [CategoryFrontController::class, 'show'])->name('front.category.show');
Route::get('/cart', [CartController::class,'index'])->name('front.cart.index');
Route::post('/checkout', [OrderFrontController::class, 'store']);

# Auth Routes
Route::view('/registerPage', 'front.auth.register');
Route::view('/loginPage', 'front.auth.login');
Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout']);

Route::middleware('auth')->group(function (){
    Route::get('/my_orders', [OrderFrontController::class, 'index'])->name('front.orders.index');
    Route::get('/cart/{product_id}/q/{quantity}/store', [CartController::class,'store'])->name('front.cart.store');
    Route::get('/cart/remove/{index}', [CartController::class,'destroy'])->name('front.cart.destroy');
    Route::post('/cart/update', [CartController::class, 'update'])->name('front.cart.update');
});

