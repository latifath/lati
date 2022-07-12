<?php

namespace App\Http\Controllers;

use App\Models\AdresseLivraison;
use App\Models\Commande;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function commande_recue($id_com, $type_paiement) {

        $commande = Commande::findOrfail($id_com);

        if($type_paiement == "livraison"){
            $commande->Update([
                "status" => 'payer à la livraison',
            ]);
        }else{
            Paiement:: create([
                'commande_id' => $commande->id,
                'reference' => $_GET ['transaction_id'],
                'montant'  => total_commande($commande->id),
                'type_paiement' => $type_paiement,
            ]);
            $commande->Update([
                "status" => 'en cours',
            ]);
        }

        $adr_livraison = AdresseLivraison::all();

        return view('site-public.commandes.commande-recue', compact('commande', 'type_paiement', 'adr_livraison'));
    }
}
