<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'name',
        'description',
    ];
    public function promotions()
{
    return $this->belongsToMany(Promotion::class);
}

public function products()
{
    return $this->belongsToMany(Product::class);
}
}
