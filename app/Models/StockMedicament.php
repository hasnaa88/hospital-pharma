<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMedicament extends Model
{
    use HasFactory;
   public $timestamps = false;

   protected $fillable = [
    'dateEntre' , 
    'medicament_id' ,
    'pharmacien_id',
    'quantite',
];


public function pharmacien()
{
    return $this->belongsTo(Pharmacien::class);
}
public function medicaments()
{
    return $this->belongsTo(Medicament::class);
}
}
