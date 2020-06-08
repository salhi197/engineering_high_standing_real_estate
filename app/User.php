<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','type','droits',
    ];

    public function historique()
    {
      return $this->hasMany(Historique::class);  
    }
    
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
