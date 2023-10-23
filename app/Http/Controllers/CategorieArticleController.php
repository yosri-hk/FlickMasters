<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\CategorieArticle;

class CategorieArticleController extends Controller
{
    public function liste_categories() {
        $categories = CategorieArticle::paginate(2);
        return view("categories.liste",['categories' => $categories]);
    }


    public function ajouterCategorie() {
        return view("categories.ajouter");
    }

    public function ajouterCategorieTraitement(Request $request) {
        $data=$request->validate([
            "name"=>"required|string|between:5,20",
            "description"=>"required|string|between:5,100",
        ]);

        
        $categorie=CategorieArticle::create($data);

        return redirect(route('categorie.liste'))->with("status","Categorie ajoute avec succes");
    }

    public function updateCategorie(CategorieArticle $categorie) {
        return view('categories.edit',['categorie'=> $categorie]);
    }

    public function updateCategorieTraitement(CategorieArticle $categorie , Request $request) 
    {
        $data=$request->validate([
            "name"=>"required|string|between:5,20",
            "description"=>"required|string|between:5,100",
        ]);


        $categorie->update($data);
        
        return redirect(route('categorie.liste'))->with('success',"Categorie modifiee  avec succes");
    }

    public function delete(CategorieArticle $categorie)
    {
        $categorie->delete();
        return redirect(route('categorie.liste'))->with('success',"Categorie supprimee  avec succes");
    }

}
