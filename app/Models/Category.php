<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title_ar', 'title_en', 'logo'];
    public function getTitleAttribute(){
        return app()->getLocale() == 'ar' ? $this->title_ar : $this->title_en;
    }

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function sizes(){
        return $this->hasMany(CategorySizes::class, 'category_id', 'id');
    }
}
