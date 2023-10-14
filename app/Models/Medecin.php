<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Medecin extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
 
    public function ordonnances()
    {
        return $this->hasMany(Ordonnance::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'departement',
        'email',
        'password',
        'patient_id',
        'dateNaissance',
        'telephone',
        'adresse'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

   
