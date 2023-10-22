<?php

use App\Http\Controllers\AdressetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StandController;

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
//Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.delete');
//
// Store routes
Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
Route::get('/stores/create', [StoreController::class, 'create'])->name('stores.create');
Route::post('/stores', [StoreController::class, 'store'])->name('stores.store');
Route::get('/stores/{store}/edit', [StoreController::class, 'edit'])->name('stores.edit');
Route::put('/stores/{store}', [StoreController::class, 'update'])->name('stores.update');

Route::delete('/stores/{store}',[StoreController::class,'destroy'])->name('stores.destroy');
Route::get('/stores/{store}/attach-detach', [StoreController::class, 'attachAndDetachPromotion'])->name('stores.attachanddetach');
Route::post('stores/{store}/attach-promotion', [StoreController::class, 'attachPromotion'])->name('stores.attach-promotion');
Route::delete('stores/{store}/detach-promotion/{promotion}', [StoreController::class, 'detachPromotion'])->name('stores.detach-promotion');
Route::get('stores/{store}/promotions', [StoreController::class,'listPromotion'])->name('stores.promotions');

// Coupon routes
Route::resource('promotions', PromotionController::class);




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

// Route configuration for Stand entity
Route::resource('stands', StandController::class);
