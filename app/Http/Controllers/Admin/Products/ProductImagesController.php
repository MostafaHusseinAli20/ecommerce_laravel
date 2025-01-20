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
            "path"=> "required|image",
        ]);

        $data = $request->except('_token','image');
        $data['path'] = Storage::disk('public')->put('add_images_products',$request->file('image'));

        Product_image::create($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product_image::find($id)->delete();
        return back();
    }
}
