<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Paiement;
use Illuminate\Http\Request;
use App\Models\CommandeProduit;
use App\Models\AdresseLivraison;

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

    public function facture($id, $type_paiement){
        $cmde = Commande::where('id', $id)->first();
        $pay = Paiement::where('commande_id', $cmde->id)->first();

        // $commande = Commande::findOrfail($cmd);
        // $total = 0;
        // $compdt = CommandeProduit::where('commande_id', $cmde->id)->get();

        // foreach ($compdt as $key => $value) {
        //     $total = $total + $value->prix * $value->quantite ;
        // }

        return view('site-public.commandes.facture', compact('cmde', 'type_paiement', 'pay'));
    }
}
