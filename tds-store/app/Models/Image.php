<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [ 'produit_id', 'path', 'created_at', 'updated_at'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
