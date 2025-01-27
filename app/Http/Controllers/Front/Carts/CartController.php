<?php

namespace App\Http\Controllers\Front\Carts;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view("front.cart.show");
    }

    public function store($product_id, $quantity)
    {
        $product = Product::find($product_id);
        carts(compact("product","quantity"), \request()->size, \request()->color);
        return back();
    }

    public function update()
    {
        $carts = carts();
        if(\request()->quantity)
            foreach(\request()->quantity as $index => $newQuantity)
                $carts[$index]->quantity = $newQuantity;
            
        session(['carts_' . auth()->id() =>json_encode($carts)]);
        return back();
    }

    public function destroy($index)
    {
        $carts = carts();
        $carts->forget($index);
        session(['carts_' . auth()->id() =>json_encode($carts)]);
        return back();
    }
}
