<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;

  protected $fillable = [
        'commande_id',
        'medicament_id',
        'quantiteCommande'
    ];


        public function medicament()
    {
        return $this->hasMany(Medicament::class);
    }
        
}
