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
'Delivery_address',
'discounts',

'subtotal',
'payment_method',
];
public function adresses()
{
    return $this->hasMany(Adresse::class);
}

}