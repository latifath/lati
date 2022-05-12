<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = ['commande_id', 'client_id', 'created_at', 'updated_at'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
