<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["name", "id_type", "description","unit_price","promotion_price","image","unit","new",];

    function getUnitPriceAttribute($value) {
        return number_format($value, 0, '', ','). ' VNĐ';
    }

    function type_product(){
        return $this->belongsTo(TypeProduct::class, 'id_type', 'id');
    }

}
