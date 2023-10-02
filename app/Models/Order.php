<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_date',
        'delivery_address',
        'total_price',
        'customer_id',
        'product_id',
        'quantity',
        
    ];
}
