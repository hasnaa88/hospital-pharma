<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    
 


    protected $fillable = [
        'nomMedicament' , 
        'prixMedicament' ,
        'dosage',
        'dateProduction',
        'datePeremption',
        'forme'
    ];

    public function Commande()
    {
        return $this->belongsToMany(Commande::class);
    }

    public function ligneCommande()
    {
        return $this->belongs(LigneCommande::class);
    }

    public function stockMedicament()
    {
        return $this->belongsTo(stockMedicament::class);
    }
    
}
