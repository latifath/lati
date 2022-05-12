<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['produit_id', 'quantite', 'created_at', 'updated_at'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}


