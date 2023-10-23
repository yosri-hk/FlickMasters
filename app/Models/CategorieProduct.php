<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieProduct extends Model
{
    protected $table = 'categorieProducts';

    protected $fillable = [
        "name",
        "description",
    ];
    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }


}