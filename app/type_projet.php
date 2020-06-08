<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_projet extends Model
{
     protected $fillable = [
        'id', 'name'

    ];
     public function projets()
    {
      return $this->belongstoMany(Projet::class);  
    }
}
