<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('Admin');
});


Route::get('/articles',[ArticleController::class,"liste_articles"])->name('article.liste');

Route::get('/ajouterArticle',[ArticleController::class,"ajouterArticle"])->name('article.ajouter');
Route::post('/ajouterArticle/traitement',[ArticleController::class,"ajouterArticleTraitement"])->name('article.ajouterTraitement');

Route::get('/updateArticle/{article}',[ArticleController::class,"updateArticle"])->name('article.edit');
Route::post('/updateArticle/{article}/traitement',[ArticleController::class,"updateArticleTraitement"])->name('article.update');


Route::delete('/deleteArticle/{article}/delete',[ArticleController::class,'delete'])->name('article.delete');

//Products 
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::resource('orders',OrderController::class );

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'delete'])->name('products.delete');


// Route configuration for Event entity
Route::resource('events', EventController::class);
