<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getTitleAttribute(){
        return app()->getLocale() == 'en' ? $this->title_en : $this->title_ar;
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id');
    }

    public function sizes(){
        return $this->belongsToMany(CategorySizes::class,'product_sizes','product_id','category_size_id');
    }

    public function props(){
        return $this->hasMany(Product_Prop::class,'product_id','id');
    }

    public function colors(){
        return $this->hasMany(ProductColor::class,'product_id','id');
    }

    public function images(){
        return $this->hasMany(Product_image::class,'product_id','id');
    }
}
