<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'email', 'address', 'phone', 'note', 'payment_method'];

    public function products() {
        return $this->hasManyThrough(Product::class, OrderDetail::class,
            'product_id', // Foreign key on the environments table...
            'order_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
    }
}
