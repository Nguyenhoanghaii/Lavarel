<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ["name", "gender", "email", "phone", "note", "total", "payment", "id_customer"];

    function billDetail()
    {
        return $this->hasMany(BillDetail::class, 'id_bill', 'id');
    }
}
