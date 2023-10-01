<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Article;

class ArticleController extends Controller
{
    public function liste_articles() {
        $articles=Article::all();
        return view("articles.liste",['articles' => $articles]);
    }


    public function ajouterArticle() {
        return view("articles.ajouter");
    }

    public function ajouterArticleTraitement(Request $request) {
        $data=$request->validate([
            "titre"=>"required",
            "contenu"=>"required",
            "datePublication"=>"required",
            "auteur"=>"required"
        ]);
        
        $article=Article::create($data);

        return redirect(route('article.liste'))->with("status","Article ajoute avec succes");
    }


    public function updateArticle(Article $article) {
        return view('articles.edit',['article'=> $article]);
    }


    public function updateArticleTraitement(Article $article , Request $request) 
    {
        $data=$request -> validate(
            [
            "titre"=>"required",
            "contenu"=>"required",
            "datePublication"=>"required",
            "auteur"=>"required"
            ]
            );
        $article->update($data);
        
        return redirect(route('article.liste'))->with('success',"Article modifie  avec succes");
    }


    public function delete(Article $article)
    {
        $article->delete();
        return redirect(route('article.liste'))->with('success',"Article supprime  avec succes");
    }

}
