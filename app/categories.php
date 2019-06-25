<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = "categories";

    public function types()
    {
        return $this->hasMany('App\types','idcategories','id');
    }

    public function news()
    {
        return $this->hasManyThrough('App\news','App\types','idcategories','idtypes','id');
    }
}
