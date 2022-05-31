<?php
use App\Models\Categorie;
use App\Models\SousCategorie;
use App\Models\Partenaire;

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
