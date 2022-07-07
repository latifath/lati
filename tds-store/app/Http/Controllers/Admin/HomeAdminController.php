<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\Commande;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;

class HomeAdminController extends Controller
{
    public function index(){
        $nbr_client = 0;

        $nbr_admin = 0;

        $nbr_role_client = User:: where('role', 'client')->get();
        $nbr_role_admin = User:: where('role', 'admin')->get();

        $nbr_client = $nbr_client + $nbr_role_client->count();

        $nbr_admin = $nbr_admin + $nbr_role_admin ->count();

    //   concernant commande

         $nb_cmd_effectuee = 0 ;
         $nb_cmd_attente = 0;
         $nb_cmd_annulee = 0;
         $nb_cmd_non_payee = 0;

        $commandes_effectuee = Commande:: where('status', 'attente paiement')->get();

        $commandes_en_attente = Commande:: where('status', 'en cours')->get();

        $commandes_annulee = Commande:: where('status', 'annulee')->get();

        $commandes_non_payee = Commande:: where('status', 'non payee')->get();

        $nb_cmd_effectuee = $nb_cmd_effectuee + $commandes_effectuee->count();

        $nb_cmd_attente = $nb_cmd_attente + $commandes_en_attente->count();

        $nb_cmd_annulee = $nb_cmd_annulee + $commandes_annulee->count();

        $nb_cmd_non_payee = $nb_cmd_non_payee + $commandes_non_payee->count();

        // recupérer tous les utilisateurs dont le role est 'client'

        // Newsletter

        $new = 0;

        $total = 0;

        $newsletters = Newsletter::all();

        $new = $new +  $newsletters->count();

        $total += $new;



        return view('/espace-admin.index', compact('nbr_client', 'nbr_admin', 'nb_cmd_effectuee', 'nb_cmd_attente', 'nb_cmd_annulee', 'nb_cmd_non_payee', 'new', 'total'));

    }

    // public function show($id){
    //     $commande = Commande:: where('adresse_client', $id);
    //         return view('espace-admin.show', compact('commande'));
    //     }

}
