<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'order_date',
        'delivery_address',
        'total_price',
        'coupon_id',
        
    ];

public function coupon()
{
    return $this->belongsTo(Coupon::class);
}
public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}
}