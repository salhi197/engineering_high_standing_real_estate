<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
     protected $fillable = [
        'id', 'image','type','titre','text'

    ];
    public function article()
   {
   	return $this->belongsto(Article::class);
   }
   public function projet()
   {
   	return $this->belongsto(Projet::class);
   }
}
