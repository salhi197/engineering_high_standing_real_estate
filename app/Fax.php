<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fax extends Model
{ protected $fillable = [
        'id', 'fax','contact_id'

    ];
  public function contact()
    {
      return $this->belongsto(Contact::class);  
    }
}
