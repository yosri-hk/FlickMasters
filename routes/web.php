<?php

use App\Http\Controllers\AdressetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

use App\Http\Controllers\CategorieArticleController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FrontCartController;





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


//   Route::get('/Cart', function index () {
//       return view('Cart.Cartt');
//  });

Route::get('/Cart',[CartController::class,"index"])->name('Cartt');


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

//Products 
Route::get('/products', [ProductController::class, 'index'])->name('products.index');


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
Route::get('/stores/show', [StoreController::class, 'show'])->name('stores.show');

Route::delete('/stores/{store}',[StoreController::class,'destroy'])->name('stores.destroy');
Route::get('/stores/{store}/attach-detach', [StoreController::class, 'attachAndDetachPromotion'])->name('stores.attachanddetach');
Route::post('stores/{store}/attach-promotion', [StoreController::class, 'attachPromotion'])->name('stores.attach-promotion');
Route::delete('stores/{store}/detach-promotion/{promotion}', [StoreController::class, 'detachPromotion'])->name('stores.detach-promotion');
Route::get('stores/{store}/promotions', [StoreController::class,'listPromotion'])->name('stores.promotions');

Route::get('/stores/{store}/products/create', [StoreController::class, 'addproduct'])->name('stores.addproduct');
Route::post('/stores/{store}/products', [StoreController::class, 'addProducttoStore'])->name('stores.addProducttoStore');
Route::get('stores/{store}/products', [StoreController::class,'listProducts'])->name('stores.products');

// Coupon routes
Route::resource('promotions', PromotionController::class);




Route::get('/carts',[CartController::class,"index"])->name('Cart.indexlist');

Route::get('/carts/create',[CartController::class,"create"])->name('Cart.create');
Route::get('/carts/create1',[CartController::class,"create1"])->name('Cart.add');
Route::post('/carts',[CartController::class,"store"])->name('Cart.store');
Route::get('/carts/{cart}/edit1',[CartController::class,"edit1"])->name('Cart.updated');
Route::get('/carts/{cart}/edit',[CartController::class,"edit"])->name('Cart.edit');
Route::put('/carts/{cart}',[CartController::class,"update"])->name('Cart.update');
//Route::put('/carts/{cart}',[CartController::class,"update1"])->name('Cart.update1');
Route::get('/search', [CartController::class,"search"])->name('search');

Route::get('/carts/show', [CartController::class, 'show'])->name('Cart.show');
//Route::get('/cart/{cart}', [CartController::class, 'show'])->name('cart.show');

Route::delete('/carts/{cart}',[CartController::class,'destroy'])->name('cart.delete');
////////////////////////////








Route::get('/adresss',[AdressetController::class,"index"])->name('Address.indexlist');

Route::get('/adresss/create',[AdressetController::class,"create"])->name('Address.create');
Route::post('/adresss',[AdressetController::class,"store"])->name('Address.store');

Route::get('/adresss/{adresse}/edit',[AdressetController::class,"edit"])->name('Address.edit');
Route::put('/adresss/{adresse}',[AdressetController::class,"update"])->name('Address.update');


Route::delete('/adresss/{adresse}',[AdressetController::class,'destroy'])->name('adresse.delete');



// Route configuration for Stand entity
Route::resource('stands', StandController::class);
// Route configuration for Event entity
Route::resource('events', EventController::class);
// Route configuration for Participation entity
Route::resource('participations', ParticipationController::class);
//Route::resource('participations', ParticipationController::class)->only(['create', 'store']);
/* Route::post('/participations/store', [ParticipationController::class, "store"])->name('participations.store');
Route::get('/participations/create', [ParticipationController::class, 'create'])->name('participations.create'); */






//route order
Route::resource('orders',OrderController::class );

//route coupon
Route::resource('coupons', CouponController::class);





Route::post('/article/{article}/like',[ArticleController::class,'like'])->name('article.like');
Route::post('/article/{article}/dislike', [ArticleController::class,'dislike'])->name('article.dislike');






