<?php

namespace App\Http\Controllers\Front\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductFrontController extends Controller
{
    public function show($id){
        $product = Product::findOrFail($id);
        return view("front.products.product_detail", compact("product"));
    }
}
