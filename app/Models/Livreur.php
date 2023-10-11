<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    use HasFactory;

    protected  $fillable=['cin','nom','prenom','photo', 'email','adresse','tel','typepermis'];
    public function livraison(){
        
        return $this->hasMany(Livraison::class);
       }
}