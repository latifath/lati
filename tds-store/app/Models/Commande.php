<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['adresse_client_id', 'adresse_livraison_id', 'status', 'user_id', 'created_at', 'updated_at'];

    public function paiements()
    {
    return $this->hasMany(Paiement::class);
    }

    public function adresse_client()
    {
    return $this->belongsTo(AdresseClient::class);
    }

    public function commande_produits()
    {
    return $this->hasMany(CommandeProduit::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function adresse_livraison()
    {
    return $this->belongsTo(AdresseLivraison::class);
    }
}
