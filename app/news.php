<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = "news";

    public function types()
    {
        return $this->belongsTo('App\types','idtypes','id');
    }

    public function comment()
    {
        return $this->hasMany('App\comment','idnews','id');
    }

}
