<?php

namespace App\Http\Controllers;

use App\Models\AdresseClient;
use App\Models\Commande;
use App\Models\CommandeProduit;
use Illuminate\Foundation\Auth\User;
use App\Http\Requests\CreateValidationCommandeFormRequest;

class CommandeController extends Controller
{
    public function valider_commande() {
        // pour recupérer les donnés dans la base d'un utilisateur connecté
        $adresseclient = AdresseClient::where('email', auth()->user()->email)->first();

        return view("site-public.commandes.validation-commande", compact('adresseclient'));
    }

    public function validation(CreateValidationCommandeFormRequest $request) {

        $clt = AdresseClient::Create(
            [
            'nom'=> request('nom'),
            'prenom'=> request('prenom'),
            'email'=> request('email'),
            'user_id' => auth()->user()->id,
            'telephone'=> request('telephone'),
            'pays'=> request('pays'),
            'rue'=> request('rue'),
            'ville'=> request('ville'),
            'code_postal'=> request('code_postal')
        ]);


        // creation de la commande
        $commande = Commande::create([
            'adresse_client_id' => $clt->id,
            'user_id' => auth()->user()->id,
            'status' => 'attente paiement',
        ]);
        //    creation et ajout d'information dans le champs commandeProduit

        foreach (session('panier') as $key => $value) {
           CommandeProduit::create([
            'commande_id' => $commande->id,
            'quantite' => $value['quantity'],
            'prix' => $value['price'],
            'produit_id' => $key,
           ]);

        }
        //  pour vider le panier apres avoir cliquer sur le button passer la commande
        session()->forget("panier");

        return redirect()->route('root_site_public_payer_la_commande', $commande->id);
    }

    public function payer_la_commande($cmd) {

        $commande = Commande::findOrfail($cmd);
        $total = 0;
        $compdt = CommandeProduit::where('commande_id', $commande->id)->get();

        foreach ($compdt as $key => $value) {
            $total = $total + $value->prix * $value->quantite ;
        }

        return view("site-public.commandes.validation-payement", compact('commande', 'total'));

    }
}
