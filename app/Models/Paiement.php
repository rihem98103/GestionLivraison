<?php

namespace App\Models;

use App\Models\Colis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;
    protected  $fillable=['etat','modepaiement','colis_id'];
    
    public function colis(){
        return $this->belongsTo(Colis::class);
       }
}