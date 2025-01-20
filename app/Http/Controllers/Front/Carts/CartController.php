<?php

namespace App\Http\Controllers\Front\Carts;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CartController extends Controller
{
    public function index(){
        return view("front.cart.show");
    }
    public function store($product_id, $quantity){
        $product = Product::find($product_id);
        carts(compact("product","quantity"));
        return back();
    }
    public function destroy($index){
        $carts = carts();
        $carts->forget($index);
        session(['carts'=>json_encode($carts)]);
        return back();
    }
}
