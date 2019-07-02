<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\types;
use App\news;

class NewsController extends Controller
{
    public function getList()
    {
        $news = news::orderBy('id','DESC')->get();
        return view('admin.news.list',['news'=>$news]);
    }

    public function getAdd()
    {
        $categories = categories::all();
        $types = types::all();
        return view('admin.news.add',['categories'=>$categories,'types'=>$types]);
    }

    public function postAdd(Request $request)
    {

    } 

    public function getEdit($id)
    {

    }

    public function postEdit(Request $request,$id)
    {

    }

    public function getDelete($id)
    {

    }
}