<?php
use App\Models\Categorie;
use App\Models\SousCategorie;

if (!function_exists('categorie_menu')) {
    function categorie_menu(){
        $categories = Categorie::all();
        return $categories;
    }
}

if (!function_exists('sous_categories_menu')) {
    function sous_categories_menu($id){
        $sous_categories = SousCategorie::where('categorie_id', $id)->get();
        return $sous_categories;
    }
}
