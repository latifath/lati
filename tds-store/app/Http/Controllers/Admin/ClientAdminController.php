<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Commande;
use App\Http\Controllers\Controller;

class ClientAdminController extends Controller
{
    public function index(){

        $utilisateurs = User::where('role', 'client')->get();

        return view('/espace-admin.clients.index', compact('utilisateurs'));
    }

     public function show($id){

        $client = User::findOrfail($id);;
        $commandes = Commande::where('user_id', $client->id)->get();


        return view('/espace-admin.clients.show', compact('client', 'commandes'));
    }

    // public function delete(User $user)
    // {
    //     $user->delete();
    //     return redirect()->route('root_espace_admin_clients_index')
    //                     ->with('success','User deleted successfully');
    // }

    public function delete($id){
        $user = User::find($id);

        return view('/espace-admin.clients.show', compact('user'));
    }
}
