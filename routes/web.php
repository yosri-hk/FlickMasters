<?php

use App\Http\Controllers\AdressetController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


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

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'delete'])->name('products.delete');





Route::get('/carts',[CartController::class,"index"])->name('Cart.indexlist');

Route::get('/carts/create',[CartController::class,"create"])->name('Cart.create');
Route::post('/carts',[CartController::class,"store"])->name('Cart.store');

Route::get('/carts/{cart}/edit',[CartController::class,"edit"])->name('Cart.edit');
Route::put('/carts/{cart}',[CartController::class,"update"])->name('Cart.update');


Route::delete('/carts/{cart}',[CartController::class,'destroy'])->name('cart.delete');
////////////////////////////








Route::get('/adresss',[AdressetController::class,"index"])->name('Address.indexlist');

Route::get('/adresss/create',[AdressetController::class,"create"])->name('Address.create');
Route::post('/adresss',[AdressetController::class,"store"])->name('Address.store');

Route::get('/adresss/{adresse}/edit',[AdressetController::class,"edit"])->name('Address.edit');
Route::put('/adresss/{adresse}',[AdressetController::class,"update"])->name('Address.update');


Route::delete('/adresss/{adresse}',[AdressetController::class,'destroy'])->name('adresse.delete');
// Route configuration for Event entity





Route::resource('events', EventController::class);
