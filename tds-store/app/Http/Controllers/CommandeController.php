<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\Models\Commande;
use App\Mail\CommandeMail;
use App\Models\AdresseClient;
use App\Models\CommandeProduit;
use App\Models\AdresseLivraison;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CreateValidationCommandeFormRequest;

class CommandeController extends Controller
{
    public function valider_commande() {
        // pour recupérer les donnés dans la base d'un utilisateur connecté
        $adresseclient = AdresseClient::where('email', auth()->user()->email)->first();

        return view("site-public.commandes.validation-commande", compact('adresseclient'));
    }

    public function validation(CreateValidationCommandeFormRequest $request) {

        if(session('panier')){


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


            if($request->nomLivraison != null ) {
                $adr = AdresseLivraison::Create([
                    'nom'=> request('nomLivraison'),
                    'prenom'=> request('prenomLivraison'),
                    'email'=> request('emailLivraison'),
                    'user_id' => auth()->user()->id,
                    'telephone'=> request('telephoneLivraison'),
                    'pays'=> request('paysLivraison'),
                    'rue'=> request('rueLivraison'),
                    'ville'=> request('villeLivraison'),
                    'code_postal'=> request('code_postalLivraison')
                ]);
            }else{
                $adr = AdresseLivraison::Create([
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
            }

            // creation de la commande
            $commande = Commande::create([
                'adresse_client_id' => $clt->id,
                'adresse_livraison_id' => $adr->id,
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

            Mail::to($clt->email)->send(new CommandeMail($clt, $commande));

            Mail::to('assiawou-latifa.monsia@epitech.eu')->send(new AdminMail($clt, $commande));

            return redirect()->route('root_site_public_payer_la_commande', [$commande->id, $request->payment]);
        } else{
            return redirect('/');
        }
    }


    public function payer_la_commande($cmd, $type_paiement) {

        $commande = Commande::findOrfail($cmd);
        $total = 0;
        $compdt = CommandeProduit::where('commande_id', $commande->id)->get();

        foreach ($compdt as $key => $value) {
            $total = $total + $value->prix * $value->quantite ;
        }

        return view("site-public.commandes.validation-payement", compact('commande', 'total','type_paiement'));

    }
}
