<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    use HasFactory;

protected $fillable = [
    'numero',
    'emplacement',
    'tarif_de_location',
    'status',
    'event_id'
];
public function event()
{
    return $this->belongsTo(Event::class);
}
}
