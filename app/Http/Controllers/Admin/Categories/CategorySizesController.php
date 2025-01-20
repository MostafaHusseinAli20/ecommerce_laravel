<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategorySizes;

class CategorySizesController extends Controller
{
    public function index($category_id)
    {
        $sizes = CategorySizes::whereCategoryId($category_id)->get();
        $category = Category::find($category_id);
        return view("dashboard.categories.categorySize.index", compact("sizes","category"));
    }

    public function store($category_id)
    {
        $category = Category::find($category_id);
        $category->sizes()->create(\request()->only("value"));
        return back();
    }

    public function destroy($id)
    {
        CategorySizes::find($id)->delete();
        return back();
    }
}
