<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ColisController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\LivraisonController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/accueil', function () { 
return 'Bienvenue sur le site !';
});

//Route::get('/', [HomeController::class,'index'])->name('home');
//Route :: middleware (['auth']) -> group (function () {

Route::resource('client',ClientController::class);
Route::resource('colis',ColisController::class);
Route::resource('product',ProductController::class);
Route::resource('livreur',LivreurController::class);
Route::resource('livraison',LivraisonController::class);
Route::resource('facture',FactureController::class);
Route::resource('paiement',PaiementController::class);
Route::get('/search/', [App\Http\Controllers\ClientController::class, 'search'])->name('search');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/contact',[App\Http\Controllers\HomeController::class, 'sendMessageGoogle'])->name('send.message.google');


//});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');