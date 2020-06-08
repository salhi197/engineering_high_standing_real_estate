<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{ protected $fillable = [
        'id', 'type','date_debut','date_fin'

    ];
   public function projet()
    {
      return $this->belongsto(Projet::class);  
    }
      public function categorie()
    {
      return $this->belongsto(Categorie_offre::class);  
    }
}
