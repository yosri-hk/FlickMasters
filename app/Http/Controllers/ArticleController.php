<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;  // zidtha lel authentification




use App\Models\Article;
use App\Models\CategorieArticle;
use App\Models\User;


class ArticleController extends Controller
{
    public function liste_articles() {
        $articles = Article::paginate(2);
        return view("articles.liste",['articles' => $articles]);
    }

    public function home() {
        return view("home");
    }


    public function index(Request $request) {
        $query = Article::query();
    
       
        if ($request->has('categorie')) {
            $categoryId = $request->input('categorie');
        
        
            if ($categoryId !== 'Toutes les catégories') {
                $query->whereHas('categories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                });
            }
        }

        if ($request->has('sort_by')) {
            $sortOption = $request->input('sort_by');
    
            if ($sortOption === 'latest') {
                $query->orderBy('datePublication', 'desc');
            } elseif ($sortOption === 'oldest') {
                $query->orderBy('datePublication', 'asc');
            }
        }
        
    
        // Paginate the results outside the if condition
        $articles = $query->paginate(2);
    
        $categories = CategorieArticle::all();

        if ($request->has('categorie') && $request->input('categorie') === 'Toutes les catégories' && $request->input('sort_by') === 'Tous les articles') {
            return redirect('/articlelist');
        }
            
        return view("articles.index", ['articles' => $articles, "categories" => $categories]);
    }
    

    public function details_articles($id)
   {
    $article = Article::find($id);

    if ($article) {
        return view('articles.details', ['article' => $article]);
    }

   }


    public function ajouterArticle() {
        $categories = CategorieArticle::all();
        return view("articles.ajouter",["categories" =>$categories]);
    }

    public function ajouterArticleTraitement(Request $request) {
        $data=$request->validate([
            "titre"=>"required|string|between:5,20",
            "contenu"=>"required|string|between:5,100",
            "datePublication"=>"required|date|after:today",
            "auteur"=>"required|alpha",
            "image"=>"required"
        ]);

        $selectedCategories = $request->input('categories');


        if ($request->hasFile('image')) {
            $storedImagePath = $request->file('image')->store('images', 'public');
        
            $filename = pathinfo($storedImagePath, PATHINFO_BASENAME);
        
        
            $data['image'] = $filename;
        }
        
        $article=Article::create($data);

        if (!empty($selectedCategories)) {
            $now = now(); 
        
            foreach ($selectedCategories as $categoryId) {
                $article->categories()->attach($categoryId, [
                    'created_at' => $data['datePublication'], 
                    'updated_at' => $now, 
                ]);
            }
        }

        return redirect(route('article.liste'))->with("status","Article ajoute avec succes");
    }


    public function updateArticle(Article $article) {
        return view('articles.edit',['article'=> $article]);
    }


    public function updateArticleTraitement(Article $article , Request $request) 
    {
        $data=$request -> validate(
            [
            "titre"=>"required|string|between:5,20",
            "contenu"=>"required|string|between:5,100",
            "datePublication"=>"required|date|after:today",
            "auteur"=>"required|alpha",
            "image"=>"required"
            ]
            );

            if ($request->hasFile('image')) {
                $storedImagePath = $request->file('image')->store('images', 'public');
            
                $filename = pathinfo($storedImagePath, PATHINFO_BASENAME);
            
            
                $data['image'] = $filename;
            }    

        $article->update($data);
        
        return redirect(route('article.liste'))->with('success',"Article modifie  avec succes");
    }


    public function delete(Article $article)
    {
        $article->delete();
        return redirect(route('article.liste'))->with('success',"Article supprime  avec succes");
    }


    public function like(Article $article)
    {
    
        if (Auth::check()) {
            // Récupérez l'utilisateur actuellement authentifié
            $user = Auth::user();
    
            // Vous pouvez maintenant utiliser l'instance $user pour effectuer des opérations
    
            $user->likedArticles()->attach($article);
    
            $article->increment('like_count');
    
            return redirect()->back();
        } else {
            // Gérez le cas où l'utilisateur n'est pas authentifié
            return redirect('/')->with('error', 'Vous devez être connecté pour aimer un article.');
        }
    }

    public function dislike(Article $article)
    {

        $user = Auth::user();


        $user->likedArticles()->detach($article);

        $article->decrement('like_count');
        
        
        return redirect()->back();
    }




}
