<?php

namespace App\Models;

use App\Models\Colis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;
    protected  $fillable=['numero','client','product','date','colis_id'];

    public function colis()
{
//return $this->hasOne(Phone::class);
return $this->belongsTo(Colis::class);
}
}