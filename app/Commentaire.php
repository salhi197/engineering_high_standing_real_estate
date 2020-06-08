<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{


	protected $fillable = [
        'id', 'email','nom','commentaire'

    ];
   public function article()
   {
   	return $this->belongsto(Article::class);
   }
}
