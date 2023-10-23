<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=[
        "titre","contenu","datePublication","auteur","image","like_count"
    ];

    public function categories()
    {
        return $this->belongsToMany(CategorieArticle::class, 'article_category', 'article_id', 'category_id');
    }

    public function likedByUsers()
    {
    return $this->belongsToMany(User::class, 'likes', 'article_id', 'user_id');
    }


}
