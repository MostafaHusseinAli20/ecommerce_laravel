<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items(){
        return $this->hasMany(Order_Item::class, "order_id", 'id');
    }

    public function tracks(){
        return $this->hasMany(OrderTrack::class, "order_id", 'id');
    }

    public function getDateAttribute(){
        return date('Y-m-d', strtotime($this->created_at));
    }

    public function getTimeAttribute(){
        return date('H:i:s', strtotime($this->created_at));
    }
}
