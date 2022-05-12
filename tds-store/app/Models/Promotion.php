<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id', 'status', 'montant', 'created_at', 'updated_at'];

    public function produit()
    {
    return $this->belongsTo(Produit::class);
    }
    
}



