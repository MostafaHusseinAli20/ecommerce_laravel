<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategorySizes;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_Prop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('dashboard.products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'price' => 'required',
            'main_image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        $data = $request->except('_token', 'main_image', 'tags','sizes');

        if($request->hasFile('main_image')){
            $data['main_image'] = Storage::disk('public')->put('main_image_products', 
            $request->file('main_image'));
        }

        $product = Product::create($data);

        if ($request->has('tags')){
            $product->tags()->sync($request->get('tags'));
        }

        if ($request->has('sizes')){
            $product->sizes()->sync($request->get('sizes'));
        }

        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $selectedSizes = $product->sizes->pluck('id')->toArray();
        return view('dashboard.products.edit', compact('product','selectedSizes'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'price' => 'required',
        ]);

        $data = $request->except('_token', 'main_image', 'tags', 'sizes',
        'key_ar', 'key_en', 'value_ar', 'value_en', 'color_ar', 'color_en', 'product_id', 'image');

        $product = Product::find($id);

        if($request->hasFile('main_image')){
            if($product->main_image && Storage::disk('public')->exists($product->main_image)){
                Storage::disk('public')->delete($product->main_image);
            }

            $data['main_image'] = Storage::disk('public')->put('main_image_products', 
            $request->file('main_image'));
        }

        $product->update($data);

        // Product Tags
        if ($request->has('tags')){
            $product->tags()->sync($request->get('tags'));
        }

        //Product Sizes
        if ($request->has('sizes')){
            $product->sizes()->sync($request->get('sizes'));
        }

        // Product Props
        if($request->get('key_ar') and $request->get('key_en') and
        $request->get('value_ar') and $request->get('value_en')){
            $product->props()->create($request->only('key_ar', 'key_en', 'value_ar', 'value_en'));
        }

        if($request->get('color_ar') and $request->get('color_en')){
            $product->colors()->create($request->only('color_ar', 'color_en'));
        }

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if($product->main_image && Storage::disk('public')->exists($product->main_image)){
            Storage::disk('public')->delete($product->main_image);
        }

        $product->delete();
        return back();
    }
}
