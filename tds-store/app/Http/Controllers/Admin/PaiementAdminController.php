<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Commande;
use App\Models\Paiement;
use App\Http\Controllers\Controller;

class PaiementAdminController extends Controller
{
    public function index(){
        $paiements = Paiement::all();
            return view('/espace-admin.paiements.index', compact('paiements'));

    }

    public function show($id){
        $client = User::findOrfail($id);;
        $commandes = Commande::where('user_id', $client->id)->get();

        return view('/espace-admin.paiements.index', compact('commandes'));
    }
}
