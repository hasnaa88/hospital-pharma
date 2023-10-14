<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateOrdonnace' ,
        'titreOrdonnace' ,
        'description',
        'medicament_id',
        'nombreFoisMedicament',
        'duree_usage' ,
        'patient_id' ,
        'medecin_id'
    ];

    public function medecin()
    {
        return $this->belongsToMany(Medecin::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
}
