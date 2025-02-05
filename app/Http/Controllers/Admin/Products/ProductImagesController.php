<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImagesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "image"=> "",
        ]);

        $data = $request->except('_token', 'image');
        $data['image'] = $request->file('image')->store('add_images_products', 'public');

        Product_image::create($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product_image::find($id)->delete();
        return back();
    }
}
