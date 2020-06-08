<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{ protected $fillable = [
        'id', 'actoin','table','information','user_id','user_name'

    ];
     
    public function user()
    {
      return $this->belongsto(User::class);  
    }
   
}
