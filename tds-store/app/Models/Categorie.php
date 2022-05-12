<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'created_at', 'updated_at'];
 
    public function sous_categories()
    {
    return $this->hasMany(SousCategorie::class);
    }
}

