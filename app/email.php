<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class email extends Model
{
	 protected $fillable = [
        'id', 'email','contact_id'

    ];
    public function contact()
    {
      return $this->belongsto(Contact::class);  
    }
}
