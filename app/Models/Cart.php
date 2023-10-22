<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
use HasFactory;
protected $fillable = [
'user_id',
'orders',
'Delivery_address',


'subtotal',
'payment_method',
];
protected $casts = [
    'orders' => 'json',
];
public function adresses()
{
    return $this->hasMany(Adresse::class);
}
public function orders()
{
    return $this->hasMany(Order::class);
}
public function calculateSubtotalForOrders(array $orderIds)
    {
        $orders = Order::whereIn('id', $orderIds)->get();
    
        $subtotal = 0;
    
        foreach ($orders as $order) {
            $subtotal += $order->total_price;
        }
    
        return $subtotal;
    }


}