<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motcle extends Model
{
    
    protected $fillable = [
        'id', 'name'

    ];
    public function articles()
    {
    return $this->belongstoMany(Article::class);   
    }
}
