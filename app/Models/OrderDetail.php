<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'bill_detail';

    protected $fillable = ['id_product', 'id_bill', 'quantity'];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
