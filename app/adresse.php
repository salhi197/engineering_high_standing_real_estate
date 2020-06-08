<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adresse extends Model
{
    protected $fillable = [
        'id', 'adresse','contact_id'

    ];
 public function contact()
    {
      return $this->belongsto(Contact::class);  
    }
}
