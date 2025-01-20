<?php

namespace App\Http\Controllers\Front\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryFrontController extends Controller
{
    public function show(Category $category)
    {
        return view("front.category.show", compact("category"));
    }
}
