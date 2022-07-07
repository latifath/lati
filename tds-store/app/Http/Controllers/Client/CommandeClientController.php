<?php

namespace App\Http\Controllers\Client;

use App\Models\Commande;
use App\Models\Paiement;
use App\Models\CommandeProduit;
use App\Http\Controllers\Controller;

class CommandeClientController extends Controller
{
        public function index(){

            $list_commandes_effectuee = Commande:: where('user_id', auth()->user()->id)->where('status', 'terminee')->get();

            $list_commandes_en_attente = Commande:: where('user_id', auth()->user()->id)->where('status', 'en cours')->get();

            $list_commandes_annulee = Commande:: where('user_id', auth()->user()->id)->where('status', 'annulee')->get();

            $list_commandes_non_payee = Commande:: where('user_id', auth()->user()->id)->where('status', 'non payee')->get();

            return view('espace-client.commande.index', compact( 'list_commandes_effectuee', 'list_commandes_en_attente', 'list_commandes_annulee', 'list_commandes_non_payee'));
        }

        public function show($id){
            $commande_detail = CommandeProduit:: where('commande_id', $id)->get();

            $commande = Commande:: where('adresse_client_id', $id)->get();


            $commandes = Paiement::where('commande_id', $id)->get();


            return view('espace-client.commande.show', compact('commande_detail', 'id', 'commande', 'commandes'));
        }
}
