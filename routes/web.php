<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieArticleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[ArticleController::class,"home"])->name('home');


Route::post('/register', [UserController::class,"register"])->name('register');

Route::post('/login', [UserController::class,"login"])->name('login');

// Route::get('/logout', [UserController::class,"logout"])->name('logout');

Route::get('/session', [UserController::class,"session"])->name('session');

Route::get('/articlelist',[ArticleController::class,"index"])->name('index');

Route::get('/admin', function () {
    return view('Admin');
});



Route::get('/categories',[CategorieArticleController::class,"liste_categories"])->name('categorie.liste');

Route::get('/ajouterCategorie',[CategorieArticleController::class,"ajouterCategorie"])->name('categorie.ajouter');

Route::post('/ajouterCategorie/traitement',[CategorieArticleController::class,"ajouterCategorieTraitement"])->name('categorie.ajouterCategorie');

Route::get('/updateCategorie/{categorie}',[CategorieArticleController::class,"updateCategorie"])->name('categorie.edit');

Route::post('/updateCategorie/{categorie}/traitement',[CategorieArticleController::class,"updateCategorieTraitement"])->name('categorie.update');

Route::delete('/deleteCategorie/{categorie}/delete',[CategorieArticleController::class,'delete'])->name('categorie.delete');




Route::get('/articles',[ArticleController::class,"liste_articles"])->name('article.liste');

Route::get('/articles/{id}',[ArticleController::class,"details_articles"])->name('article.details');

Route::get('/ajouterArticle',[ArticleController::class,"ajouterArticle"])->name('article.ajouter');
Route::post('/ajouterArticle/traitement',[ArticleController::class,"ajouterArticleTraitement"])->name('article.ajouterTraitement');

Route::get('/updateArticle/{article}',[ArticleController::class,"updateArticle"])->name('article.edit');
Route::post('/updateArticle/{article}/traitement',[ArticleController::class,"updateArticleTraitement"])->name('article.update');


Route::delete('/deleteArticle/{article}/delete',[ArticleController::class,'delete'])->name('article.delete');



Route::post('/article/{article}/like',[ArticleController::class,'like'])->name('article.like');
Route::post('/article/{article}/dislike', [ArticleController::class,'dislike'])->name('article.dislike');






