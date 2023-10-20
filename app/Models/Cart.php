<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
use HasFactory;
protected $fillable = [
'user_id',
'items',
'discounts',
'delivery_address',
'subtotal',
'payment_method',
];
}