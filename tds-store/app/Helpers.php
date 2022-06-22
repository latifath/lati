<?php
use App\Models\Client;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use App\Models\Partenaire;
use App\Models\SousCategorie;
use App\Models\CommandeProduit;

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

if(!function_exists('couleur1')) {
    function couleur1() {
         return "background-color : #EDF1FF";
    }
}

if(!function_exists('couleur2')) {
    function couleur2() {
         return "background-color : #D19C97";
    }
}

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
// pour recupérer les informations du client qui a payé
// if(!function_exists('client')) {
//     function client($id){
//         $commande_cli = Commande :: where('client_id', $id)->get();
//         return $commande_cli;
//     }
// }

if(!function_exists('client')) {
    function client($id) {
        $clients = Client::findOrfail($id);
        return $clients;
    }
}
// end


