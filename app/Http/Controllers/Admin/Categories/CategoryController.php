<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'logo' => 'sometimes|image|mimes:jpg,png,jpeg'
        ]);

        $data = $request->only('title_ar', 'title_en');

        if($request->hasFile('logo')){
            $data['logo'] = Storage::disk('public')->put('logos',$request->file('logo'));
        }
        Category::create($data);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'logo' => 'sometimes|image|mimes:jpg,png,jpeg'
        ]);

        $category = Category::findOrFail($id);

        $data = $request->only('title_ar', 'title_en');

        if($request->hasFile('logo')){
            if($category->logo && Storage::disk('public')->exists($category->logo)){
                Storage::disk('public')->delete($category->logo);
            }
            
            $data['logo'] = Storage::disk('public')->put('logos', $request->file('logo'));
        }

        $category->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        
        if($category->logo && Storage::disk('public')->exists($category->logo)){
            Storage::disk('public')->delete($category->logo);
        }

        $category->delete();
        return back();
    }
}
