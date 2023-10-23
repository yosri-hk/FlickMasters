<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'product_id',
        'quantity',
        'order_date',
        'delivery_address',
        'total_price',
        'coupon_id',
    ];
}
