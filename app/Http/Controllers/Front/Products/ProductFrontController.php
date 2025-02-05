<?php

namespace App\Http\Controllers\Front\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFeedback;
use App\Models\User;

class ProductFrontController extends Controller
{
    public function show($id){
        $product = Product::findOrFail($id);
        return view("front.products.product_detail", compact("product"));
    }
}
