<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function valider_commande() {
        return view("site-public.commandes.validation-commande");
    }
}
