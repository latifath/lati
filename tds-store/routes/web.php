<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\SitepublicController;
use App\Http\Controllers\Admin\ClientAdminController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Client\HomeClientController;
use App\Http\Controllers\Admin\CommandeAdminController;
use App\Http\Controllers\Admin\PaiementAdminController;
use App\Http\Controllers\Client\CommandeClientController;
use App\Http\Controllers\Client\PaiementClientController;

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

Route::get('validation-commande', [CommandeController::class, 'valider_commande'])->name('root_site_public_validation_commande')->middleware('auth');

Route::post('validation-commande/create', [CommandeController::class, 'validation'])->name('root_site_public_validation');

Route::post('validation-commande/update/adresse-facturation', [CommandeController::class, 'edit_adresse_facturation'])->name('root_site_public_edit_adresse_facturation');

Route::post('validation-commande/update/adresse-livraison', [CommandeController::class, 'edit_adresse_livraison'])->name('root_site_public_edit_adresse_livraison');

Route::get('annulation-commande/{id}', [CommandeController::class, 'annuler_commande'])->name('root_site_public_annuler_commande');

// Route::get('validation-commande/confirmation', [CommandeController::class, 'confirmation'])->name('root_site_public__confirmation');

Route::get('validation-commmande/{id}/payer-la-commande/type-paiement-{payment}', [CommandeController::class, 'payer_la_commande'])->name('root_site_public_payer_la_commande');

Route::get('validation-commmande/{id}/commande-reçue/type-paiement-{payment}', [PayementController::class, 'commande_recue'])->name('root_site_public_commande_recue');

Route::get('commande/{id}/type-paiement-{paiement}/facturation', [PayementController::class, 'facture'])->name('root_site_public_facture');

Route::post('/newsletter', [HomeController::class, 'newsletter'])->name('root_site_public_newsletter');

Route::post('/place-order', [PayementController::class, 'placeorder'])->name('root_site_public_placeorder');

// paypal

Route::get('create-transaction', [PayementController::class, 'createpaypaltransaction'])->name('root_create_payapl_transaction');
Route::get('process-transaction', [PayementController::class, 'processpaypaltransaction'])->name('root_process_paypal_transaction');
Route::get('success-transaction', [PayementController::class, 'successpaypaltransaction'])->name('root_success_paypal_transaction');
Route::get('cancel-transaction', [PayementController::class, 'cancelpaypaltransaction'])->name('root_cancel_paypal_transaction');


//Espace AdresseClient

Route::get('/espace-client', [HomeClientController::class, 'index'])->name('root_espace_client_index')->middleware('auth');

Route::get('/espace-client/commande', [CommandeClientController:: class, 'index'])->name('root_espace_client_commande_index');

Route ::get('/espace-client/commande/{id}/detail', [CommandeClientController:: class, 'show'])->name('root_espace_client_commande_show');

Route::get('/espace-client/paiement', [PaiementClientController:: class, 'index'])->name('root_espace_client_paiement_index');


// Espace admin
Route::get('/espace-admin', [HomeAdminController::class, 'index'])->name('root_espace_admin_index')->middleware('auth');

Route::get('/verification-auth', [SitepublicController::class, 'verification'])->name('root_verification_auth');

Route::get('/espace-admin/clients', [ClientAdminController::class, 'index'])->name('root_espace_admin_clients_index');

Route::delete('espace-admin/clients/supprimer/{id}', [ClientAdminController::class, 'delete'])->name('root_delete_clients');

Route::get('/espace-admin/clients/{id}/detail', [ClientAdminController::class, 'show'])->name('root_espace_admin_clients_show');

Route::get('espace-admin/paiements', [PaiementAdminController::class, 'index'])->name('root_espace_admin_paiements_index');

Route::get('espace-admin/paiements/{id}', [PaiementAdminController::class, 'show'])->name('root_espace_admin_paiements_show');

Route::get('espace-admin/commandes', [CommandeAdminController::class, 'index'])->name('root_espace_admin_commandes_index');

Route::get('espace-admin/commandes/{id}/show', [CommandeAdminController::class, 'show'])->name('root_espace_admin_commandes_show');

Route::get('espace-admin/client/newsletter', [HomeAdminController::class, 'news'])->name('root_espace_admin_commandes_news');

Route::get('espace-admin/utilisateurs', [UserController::class, 'index_utilisateur'])->name('root_espace_admin_index_utilisateur');

Route::post('espace-admin/utilisateur/update', [UserController::class, 'edit_utilisateur'])->name('root_espace_admin_edit_utilisateur');

Route::delete('espace-admin/utilisateur/{id}/supprimer', [UserController::class, 'delete'])->name('root_espace_admin_delete_utilisateur');





Route::get('/tableau', function() {
    return view('espace-client/gestion');
})->name('root_espace_client_gestion');

// End espace AdresseClient


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });


Route::get('se-connecter', [UserController::class, 'connexion'])->name('root_auth_user_login')->middleware("guest");
Route::get('s-inscrire', [UserController::class, 'inscription'])->name('root_auth_user_register')->middleware("guest");
Route::get('se-deconnecter', [UserController::class, 'deconnexion'])->name('root_deconnexion');
