<?php
use App\Models\Categorie;
use App\Models\SousCategorie;
use App\Models\Partenaire;
// use App\Models\Produit;

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



// if(!function_exists('produits_menu')) {
//      function produits_menu($id) {
//          $produits = Produit:: where('sous_categorie_id', $id)->get();
//          return $produits;
//      }
// }
