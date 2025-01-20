<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Product_Prop;
use Illuminate\Http\Request;

class ProductPropsController extends Controller
{
    public function destroy($id){
        Product_Prop::find($id)->delete();
        return back();
    }

    public function update(Request $request, $id){
        Product_Prop::find($id)->update($request->except('_token','_method'));
        return back();
    }
}
