<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo_etat extends Model
{
    public function projet()
    {
      return $this->belongsto(Projet::class);  
    }
}
