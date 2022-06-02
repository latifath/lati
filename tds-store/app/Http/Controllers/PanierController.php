<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Repositories\PanierInterfaceRepository;

class PanierController extends Controller
{
    protected $panierRepository; // L'instance BasketSessionRepository

    /**
     * __construct
     *
     * @param  PanierInterfaceRepository $panierRepository
     * @return void
     */
    public function __construct(PanierInterfaceRepository $panierRepository) {
    	$this->panierRepository = $panierRepository;
    }

    # Affichage du panier
    public function show () {
    	return view("site-public.panier.show"); // resources\views\basket\show.blade.php
    }

    # Ajout d'un produit au panier
    public function create (Produit $produit, Request $request) {

    	// Validation de la requête
    	$this->validate($request, [
    		"quantite" => "numeric|min:1"
    	]);

    	// Ajout/Mise à jour du produit au panier avec sa quantité
    	$this->panierRepository->create($produit, $request->quantite);

    	// Redirection vers le panier avec un message
    	return redirect()->route("root_show_panier")->withMessage("Produit ajouté au panier");
    }

    // Suppression d'un produit du panier
    public function delete (Produit $produit) {

    	// Suppression du produit du panier par son identifiant
    	$this->panierRepository->delete($produit);

    	// Redirection vers le panier
    	return back()->withMessage("Produit retiré du panier");
    }

    // Vider la panier
    public function empty () {

    	// Suppression des informations du panier en session
    	$this->panierRepository->empty();

    	// Redirection vers le panier
    	return back()->withMessage("Panier vidé");

    }


}
