<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;
    protected  $fillable=['etat','prix','datedepart','datearrive','livreur_id'];
    public function livreur()
    {
        return $this->belongsTo(Livreur::class);
    }
    
      public function colis(){
        return $this->hasMany(Colis::class);
       }
}