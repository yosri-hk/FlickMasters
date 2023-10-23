<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    // Define the table associated with the model (optional if table name follows Laravel conventions)
    protected $table = 'categories';

    // Define the fillable attributes (attributes that can be mass-assigned)
    protected $fillable = [
        'name',
        'description',
    ];

    // Define a relationship between Category and Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
