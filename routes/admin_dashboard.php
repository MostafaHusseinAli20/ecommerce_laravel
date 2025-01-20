<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Categories\CategorySizesController;
use App\Http\Controllers\Admin\Products\ProductColorController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Products\ProductImagesController;
use App\Http\Controllers\Admin\Products\ProductPropsController;
use App\Http\Controllers\Admin\Sliders\SliderController;
use App\Http\Controllers\Admin\Tags\TagController;
use Illuminate\Support\Facades\Route;

Route::resource('admin', AdminController::class);
Route::resource('categories', CategoryController::class);
Route::get('category/{category_id}/sizes', [CategorySizesController::class, 'index'])->name('category.sizes');
Route::post('category/{category_id}/sizes/store', [CategorySizesController::class, 'store'])->name('category.sizes.store');
Route::delete('category_delete/{id}/sizes', [CategorySizesController::class, 'destroy'])->name('category.destroy');
Route::resource('tags', TagController::class);
Route::resource('products', ProductController::class);
Route::resource('props', ProductPropsController::class);
Route::resource('product_images', ProductImagesController::class);
Route::resource('sliders', SliderController::class);
Route::resource('product_colors', ProductColorController::class);
