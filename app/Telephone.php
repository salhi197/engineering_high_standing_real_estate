<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $fillable = [
        'id', 'telephone','contact_id'

    ];
   public function contact()
    {
      return $this->belongsto(Contact::class);  
    }
}
