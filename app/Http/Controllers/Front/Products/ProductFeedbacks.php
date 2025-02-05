<?php

namespace App\Http\Controllers\Front\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFeedback;
use Illuminate\Http\Request;

class ProductFeedbacks extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request, [
            "user_id" => "required|exists:users,id",
            "product_id" => "required|exists:products,id",
            "rate" => "required|integer|min:1|max:5",
            "comment"=> "nullable|string",
        ]);
        ProductFeedback::create($data);
        return back()->with("success",__('front.message_added_succssfuly'));
    }
}
