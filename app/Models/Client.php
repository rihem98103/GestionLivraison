<?php

namespace App\Models;

use App\Models\Colis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected  $fillable=['cin','nom','prenom','status','photo', 'email','adresse','tel'];

    public function colis(){
        return $this->hasMany(Colis::class);
       }
    
    
}