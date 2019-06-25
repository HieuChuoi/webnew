<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class types extends Model
{
    protected $table = "types";

    public function categories()
    {
        return $this->belongsTo('App\categories','idcategories','id');
    }

    public function news()
    {
        return $this->hasMany('App\news','idtypes','id'); 
    }
    
}
