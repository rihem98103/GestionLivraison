<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    use HasFactory;
    protected  $fillable=['nom','poids','nbre', 'prix','client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
       }

       public function paiement()
       {
           return $this->hasMany(Paiement::class);
       }


       public function facture()
{
//return $this->belongsTo(User::class);
return $this->hasOne(facture::class);
}

public function livraison()
{
    return $this->belongsTo(Livraison::class);
}
}