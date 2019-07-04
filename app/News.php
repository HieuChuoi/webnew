<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = "news";

    public function types()
    {
        return $this->belongsTo('App\Types','idtypes','id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment','idnews','id');
    }

}
