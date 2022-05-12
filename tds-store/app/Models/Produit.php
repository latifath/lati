<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [ 'souscategorie_id', 'nom', 'description', 'quantite', 'prix', 'image', 'created_at', 'updated_at' ];

    public function promotions()
    {
    return $this->hasMany(Promotion::class);
    }

    public function stocks()
    {
    return $this->hasMany(Stock::class);
    }

    public function souscategorie()
    {
    return $this->belongsTo(SousCategorie::class);
    }

    public function panier_produits()
    {
    return $this->hasMany(PanierProduit::class);
    }
    
    public function commande_produits()
    {
    return $this->hasMany(CommandeProduit::class);
    }

    public function favoris()
    {
    return $this->hasMany(Favoris::class);
    }

    public function images()
    {
    return $this->hasMany(Image::class);
    }


    

}




