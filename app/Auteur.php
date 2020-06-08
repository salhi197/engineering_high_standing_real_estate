<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $fillable = [
        'id', 'nom'

    ];
     public function articles()
    {
      return $this->belongstoMany(Article::class);  
    }
}
