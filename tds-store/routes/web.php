<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\SitepublicController;

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

Route::get('/', [HomeController::class, 'index'])->name('root_index');

Route::get('/produits', [SitepublicController::class, 'produits'])->name('root_sitepublic_produits');

Route::get('/p/{categorie}/{sous_categorie}', [SitepublicController::class, 'all_produit_par_sous_categorie'])->name('root_sitepublic_all_produit_par_sous_categorie');

Route::get('/p/{categorie}/{sous_categorie}/{produit}', [SitepublicController::class, 'show_produit_par_sous_categorie'])->name('root_sitepublic_show_produit_par_sous_categorie');

Route::get('panier', [PanierController::class, 'show'])->name('root_show_panier');

Route::post('panier/ajouter/{produit}', [PanierController::class, 'create'])->name('root_create_panier');

Route::get('/panier/supprimer/{produit}', [PanierController::class, 'delete'])->name('root_delete_panier');

Route::get('panier/vider', [PanierController::class, 'empty'])->name('root_empty_panier');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/s-inscrire', function(){
    return view('auth/user_register');
});
Route::get('/se-connecter', function(){
    return view('auth/user_login');
});

