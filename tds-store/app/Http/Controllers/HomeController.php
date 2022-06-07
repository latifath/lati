<?php

namespace App\Http\Controllers;

use App\Models\Produit;


class HomeController extends Controller
{
    public function index()
    {
        $produits_latest = Produit::orderBy('id', 'DESC')->limit(6)->get();
        return view('site-public.index', compact('produits_latest'));
    }
}


