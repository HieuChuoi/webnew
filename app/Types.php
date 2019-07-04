<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class types extends Model
{
    protected $table = "types";

    public function categories()
    {
        return $this->belongsTo('App\Categories','idcategories','id');
    }

    public function news()
    {
        return $this->hasMany('App\News','idtypes','id'); 
    }
    
}
