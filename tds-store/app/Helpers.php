<?php
use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Paiement;
use App\Models\Categorie;
use App\Models\Partenaire;
use App\Models\AdresseClient;
use App\Models\SousCategorie;
use App\Models\CommandeProduit;
use App\Models\AdresseLivraison;


if(!function_exists('couleur_text_1')) {
    function couleur_text_1() {
         return "color :  #01674e";
    }
}

if(!function_exists('couleur_background_1')) {
    function couleur_background_1() {
         return "background-color :  #01674e";
    }
}

if(!function_exists('couleur_text_2')) {
    function couleur_text_2() {
         return "color :  #ea0513";
    }
}

if(!function_exists('couleur_background_2')) {
    function couleur_background_2() {
         return "background-color :  #ea0513";
    }
}

if(!function_exists('couleur_text_3')){
    function couleur_text_3(){
        return "color: #1C1C1C";
    }
}

if(!function_exists('couleur_principal')){
    function couleur_principal(){
        return "background-color: #EDF1FF";
    }
}

if(!function_exists('couleur_blanche')){
    function couleur_blanche(){
        return "color: #ffff";
    }
}



if (!function_exists('categorie_menu')) {
    function categorie_menu(){
        $categories = Categorie::all() ;
        return $categories;

    }
}

if (!function_exists('sous_categories_menu')) {
    function sous_categories_menu($id){
        $sous_categories = SousCategorie::where('categorie_id', $id)->get();
        return $sous_categories;
    }
}

if (!function_exists('partenaires_logo')) {
     function partenaires_logo() {
         $partenaires = Partenaire::all();
         return $partenaires;
     }
}

if (!function_exists('one_sous_categorie')) {
     function one_sous_categorie($id) {
     $sous_categorie = SousCategorie::where('id', $id)->first();
     return $sous_categorie;
     };
}
if (!function_exists('one_categorie')) {
    function one_categorie($id) {
        $categorie = Categorie:: where('id', $id)->first();
        return $categorie;
    }
}

// #20c997 entente
//  :#ee740d reste

// pour faire appel au montant total vu qu'elle apparait sur plusieurs pages
if(!function_exists('total_commande')){
    function total_commande($id){
        $total = 0;
        $compdt = CommandeProduit::where('commande_id', $id)->get();

        foreach ($compdt as $key => $value) {
            $total = $total + $value->prix * $value->quantite ;
        }

        return $total ;
    }
}
// end

if(!function_exists('detail_commande')) {
    function detail_commande($id){
        $commande_produit = CommandeProduit:: where('commande_id', $id)->get();
        return $commande_produit;
    }
}

if(!function_exists('produit')) {
    function produit($id){
        $produit = Produit::findOrfail($id);
        return $produit;
    }
}
// pour recupérer les informations du AdresseClient qui a payé

if(!function_exists('adresseclient')) {
    function adresseclient($id) {
        $adresseclients = AdresseClient::findOrfail($id);
        return $adresseclients;
    }
}
// end


if(!function_exists('account_commande')) {
    function account_commande($id){
        $account = Paiement::where('commande_id', $id)->first();
        return $account;
    }
}

if(!function_exists('compte_com')){
    function compte_com($id){
        $com = Paiement::findOrfail($id);
        return $com;
    }
}

if(!function_exists('commande')){
    function commande($id){
        $commande = Commande::where('id', $id)->first();
        return $commande;

    }
}

if(!function_exists('adresselivraison')) {
    function adresselivraison($id) {
        $adresselivraisons = AdresseLivraison::findOrfail($id);
        return $adresselivraisons;
    }
}

// if(!function_exists('info_commande')){
//     function info_commande($id){
//     $client = User::findOrfail($id);
//     $commandes = Commande::where('user_id', $client->id)->get();
//     return $commandes;
//     }
// }
