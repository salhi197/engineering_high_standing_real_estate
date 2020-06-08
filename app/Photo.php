<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
     public function projet()
    {
      return $this->belongsto(Projet::class);  
    }
     public function standards()
    {
      return $this->belongsto(Standard::class);  
    }
}
