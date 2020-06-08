<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
     protected $fillable = [
        'id', 'nom','description','appartements','partieC','localisation','type','parking','pourcentage','positionne','video'

    ];
     public function photos()
    {
      return $this->hasMany(Photo::class);  
    }
     public function photos_etats()
    {
      return $this->hasMany(Photo_etat::class);  
    }
    public function offre()
    {
      return $this->hasOne(Offre::class);  
    }
   
     
}
