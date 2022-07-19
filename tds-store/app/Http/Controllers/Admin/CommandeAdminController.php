<?php

namespace App\Http\Controllers\Admin;

use App\Models\Commande;
use App\Models\Paiement;
use App\Models\AdresseClient;
use App\Models\AdresseLivraison;
use App\Http\Controllers\Controller;

class CommandeAdminController extends Controller
{
    public function index(){
        $commandes = Commande::all();
        return view('espace-admin.commandes.index', compact('commandes'));
    }

    public function show($id){
        $commande = Commande::where('id', $id)->first();

       $adr_cli = AdresseClient::where('id', $commande->adresse_client_id)->first();

       $adr_livr = AdresseLivraison::where('id', $commande->adresse_livraison_id)->first();


        $paiement_commande = Paiement::where('commande_id', $commande->id)->first();

        return view('espace-admin.commandes.show', compact('paiement_commande', 'adr_cli', 'commande', 'adr_livr'));
    }
}
