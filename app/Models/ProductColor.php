<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getColorAttribute(){
        return app()->getLocale() == 'en' ? $this->color_en : $this->color_ar;
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
