<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
use HasFactory;
protected $fillable = [
   
'Deliveryaddresse',
'City',
'Postal_code',

];
public function cart()
{
    return $this->belongsTo(Cart::class);
}
}