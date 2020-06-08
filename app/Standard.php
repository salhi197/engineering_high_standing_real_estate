<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
      protected $fillable = [
        'id', 'securite','confort','esthetique','fonctoinnalite'

    ];
    public function photos()
    {
      return $this->hasMany(Photo::class);  
    }
}
