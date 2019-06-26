<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;

class categoriesController extends Controller
{
    public function getList()
    {
        $categories = categories::all();
        return view('admin.categories.list',['categories'=>$categories]
            );
    }

    public function getAdd()
    {

    }

    public function getEdit()
    {

    }
}
