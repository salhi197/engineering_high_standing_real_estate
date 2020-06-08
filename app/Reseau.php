<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseau extends Model
{  protected $fillable = [
        'id', 'type','url'

    ];
    public function contact()
    {
      return $this->belongsto(Contact::class);  
    }
}
