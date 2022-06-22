<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Newsletter;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $produits_latest = Produit::orderBy('id', 'DESC')->limit(6)->get();
        return view('site-public.index', compact('produits_latest'));
    }


    public function showproduit(produit $id)
    {
        return $id;

    }

    // pour enregistrer le mail inserer dans le newsletter

    public function newsletter(Request $request){
        //  pour la verification de la validiter du mail

        $request->validate([
            'email' => 'required|string|email|unique:newsletters,email,except,id',
        ]);

        Newsletter:: create([
            "email" => $request->email,
        ]);

        flashy()->success('Abonée');
          return redirect()->back();
    }
    // End

}
