<?php

namespace App\Http\Controllers\Front\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Product::query();

        // Filter Categories
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter Sizes
        if ($request->has('size_id')) {
            $query->whereHas('sizes', function ($q) use ($request) {
                $q->where('category_sizes.id', $request->size_id);
            });
        }

        // Filter By Price Sorted
        if ($request->has('sort_by')) {
             if($request->sort_by === 'price_high'){
                $query->orderBy('price','desc');
            }else if($request->sort_by === 'price_low'){
                $query->orderBy('price','asc');
            }else if($request->sort_by === 'newness'){
                $query->orderBy('created_at','desc');
            }
        }

        // Filter By Price
        if ($request->has('price_between')) {
            switch ($request->price_between) {
                case '0':
                    $query->whereBetween('price', [0, 100]);
                    break;
        
                case '100':
                    $query->whereBetween('price', [100, 200]);
                    break;
        
                case '200':
                    $query->whereBetween('price', [200, 300]);
                    break;
        
                case '300':
                    $query->whereBetween('price', [300, 400]);
                    break;
        
                case '400':
                    $query->where('price', '>=', 400);
                    break;

                default:
                    break;
            }
        }
        

        $products = $query->get();

        return view("front.home.index", compact("products"));
    }
}
