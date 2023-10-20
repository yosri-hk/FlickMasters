<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=[
        "titre","contenu","datePublication","auteur","image"
    ];

    public function categories()
    {
        return $this->belongsToMany(CategorieArticle::class, 'article_category', 'article_id', 'category_id');
    }

}
