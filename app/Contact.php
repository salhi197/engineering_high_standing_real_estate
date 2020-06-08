<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $fillable = [
        'id', 'localisation'
    ];
    
    public function telephones()
    {
      return $this->hasMany(Telephone::class);  
    }
      public function emails()
    {
      return $this->hasMany(email::class);  
    }
     public function adresses()
    {
      return $this->hasMany(adresse::class);  
    }
     public function faxs()
    {
      return $this->hasMany(Fax::class);  
    }
      public function reseaux()
    {
      return $this->hasMany(Reseau::class);  
    }
    
   
}
