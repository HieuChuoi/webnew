<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = "comment";

    public function news()
    {
        return $this->belongsTo('App\news','idnews','id');
    }

    public function user()
    {
        return $this->belongsTo('App\user','iduser','id');
    }

}
