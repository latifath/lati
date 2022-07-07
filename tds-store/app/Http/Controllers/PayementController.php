<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function commande_recue($id_com) {
        $commande = Commande::findOrfail($id_com);
        Paiement:: create([
            'commande_id' => $commande->id,
            'reference' => $_GET ['transaction_id'],
            'montant'  => total_commande($commande->id),
            'type_paiement' => 'KKIAPAY',
        ]);

        $commande->Update([
            "status" => 'en cours',
        ]);

        return view('site-public.commandes.commande-recue', compact('commande'));
    }

}

