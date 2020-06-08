<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
protected $fillable = [
        'id', 'titre','resume','text','source','categorie','photo'

    ];
     public function auteurs()
    {
      return $this->belongstoMany(Auteur::class);  
    }
     public function motcles()
    {
    return $this->belongstoMany(Motcle::class);   
    }
    public function comments()
    {
      return $this->hasMany(Commentaire::class);
    }
}
