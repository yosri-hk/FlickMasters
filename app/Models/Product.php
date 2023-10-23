<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        "name",
        "description",
        "price",
        "quantity",
        "weight",
        "image_url",
    ];
    public function categorieProduct()
{
    return $this->belongsTo(CategorieProduct::class, 'category_id'); 
}


}
