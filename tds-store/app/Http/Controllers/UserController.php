<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function connexion(){
        return view('auth/user_login');
    }

    public function inscription(){
        return view('auth/user_register');
    }

    public function deconnexion(){
        Auth::logout();
        flashy()->error('Vous êtes maintenant déconnecté !');
        return redirect()->route('root_index');
    }
}
