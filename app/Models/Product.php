<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'products';

    
    protected $fillable = [
        "name",
        "description",
        "price",
        "quantity",
        "weight",
        "image_url",
        "store_id",
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'product_id');
    }  
      public function stores()
    {
        return $this->belongsToMany(Store::class);
    }
    public function categorieProduct()
    {
        return $this->belongsTo(CategorieProduct::class, 'category_id'); 
    }
    
}
