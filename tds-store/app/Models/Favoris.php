<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    use HasFactory;

    protected $fillable = [ 'produit_id', 'created_at', 'updated_at' ];

    public function produits()
    {
    return $this->belongsTo(Produit::class);
    }
}

