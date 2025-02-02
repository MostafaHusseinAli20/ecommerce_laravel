<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noftification extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    
    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
