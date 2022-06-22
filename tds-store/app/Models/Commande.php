<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'status', 'created_at', 'updated_at'];

    public function paiements()
    {
    return $this->hasMany(Paiement::class);
    }

    public function client()
    {
    return $this->belongsTo(Client::class);
    }

    public function commande_produits()
    {
    return $this->hasMany(CommandeProduit::class);
    }
}
