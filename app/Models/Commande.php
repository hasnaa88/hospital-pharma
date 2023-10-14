<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
  

    protected $fillable = [
        'dateCommande',
        'pharmacien_id',
        'fournisseur_id',
        'valide'
    ];


    public function pharmacien()
    {
        return $this->belongsTo(Pharmacien::class);
    }

 
    
}
