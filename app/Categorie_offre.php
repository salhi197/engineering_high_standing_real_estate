<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie_offre extends Model
{
     protected $fillable = [
        'id', 'name'

    ];
     public function offre()
    {
      return $this->belongstoMany(Offre::class);  
    }
}
