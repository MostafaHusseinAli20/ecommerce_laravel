<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Prop extends Model
{
    use HasFactory;
    protected $fillable = ['key_ar', 'key_en', 'value_ar', 'value_en'];

    public function getValueAttribute(){
        return app()->getLocale() == 'en' ? $this->value_en : $this->value_ar;
    }

    public function getKeyAttribute(){
        return app()->getLocale() == 'en' ? $this->key_en : $this->key_ar;
    }
}
