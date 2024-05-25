<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'order_id', 'quantity'];

    public function product() {
        return $this->hasOne(Product::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
