<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Categories\CategorySizesController;
use App\Http\Controllers\Admin\Contact\AdminContactController;
use App\Http\Controllers\Admin\Noftifications\NoftificationController;
use App\Http\Controllers\Admin\Orders\OrderController;
use App\Http\Controllers\Admin\Products\ProductColorController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Products\ProductImagesController;
use App\Http\Controllers\Admin\Products\ProductPropsController;
use App\Http\Controllers\Admin\Sliders\SliderController;
use App\Http\Controllers\Admin\Tags\TagController;
use Illuminate\Support\Facades\Route;

Route::view('/registerPage', 'dashboard.auth.register');
Route::view('/loginPage', 'dashboard.auth.login');
Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('admin')->group(function () {
    Route::view('/index', 'dashboard.index');
    Route::resource('admin', AdminController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('category/{category_id}/sizes', [CategorySizesController::class, 'index'])->name('category.sizes');
    Route::post('category/{category_id}/sizes/store', [CategorySizesController::class, 'store'])->name('category.sizes.store');
    Route::delete('category_delete/{id}/sizes', [CategorySizesController::class, 'destroy'])->name('category.destroy');
    Route::resource('tags', TagController::class);
    Route::resource('products', ProductController::class);
    Route::resource('props', ProductPropsController::class);
    Route::resource('product_images', ProductImagesController::class)->only('store', 'destroy');
    Route::resource('sliders', SliderController::class);
    Route::resource('product_colors', ProductColorController::class);
    Route::resource('orders', OrderController::class)->only('index', 'show', 'update');
    Route::get('/contact/show/{id}', [AdminContactController::class,'show'])->name('contact.show');
    Route::delete('/contact/destroy/{id}', [AdminContactController::class,'destroy'])->name('contact.destroy');
    Route::post('/contact/destroy/all', [AdminContactController::class, 'destroyAll'])->name('contact.destroyAll');
    Route::delete('noftification/delete/{id}', [NoftificationController::class, 'destroy'])->name('notification.destroy');
    Route::delete('/notifications/soft-delete-all', [NoftificationController::class, 'softDeleteAll'])->name('notifications.soft-delete-all');
});
