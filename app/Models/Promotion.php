<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code_percentage',
        'start_date',
        'end_date',
    ];
    public function stores()
{
    return $this->belongsToMany(Store::class);
}

}
