<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = "comment";

    public function news()
    {
        return $this->belongsTo('App\News','idnews','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','iduser','id');
    }

}
