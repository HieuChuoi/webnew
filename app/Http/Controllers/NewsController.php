<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Types;
use App\News;
use App\Http\Requests\AddNewsRequest;

class NewsController extends Controller
{
    public function getList()
    {
        $news = News::orderBy('id', 'DESC')->get();
        return view('admin.news.list', ['news' => $news]);
    }

    public function getAdd()
    {
        $categories = Categories::all();
        $types = Types::all();
        return view('admin.news.add', ['categories' => $categories, 'types' => $types]);
    }

    public function postAdd(AddNewsRequest $request)
    {
        $news = new News;
        $news->title = $request->title;
        $news->unsigned_title = changeTitle($request->title);
        $news->idtypes = $request->types;
        $news->summary = $request->summary;
        $news->content = $request->content;
        // $news->view = "";
        $news->highlight = $request->highlight;

        if ($request->hasFile('image')) {
            // $filename = $request->file('image')->getClientOriginalName();
            // $file = $request->file('image');
            // $move->$file->move('upload/tintuc',$filename);
            // $news->image = $filelname;
            $news->image = $request->file('image');
        } else {
            $news->image = "";
        }

        // $news->image = $file;
        $news->save();

        return redirect('admin/news/add')->with('notification', 'Add news success');
    }

    public function getEdit($id)
    { }

    public function postEdit(Request $request, $id)
    { }

    public function getDelete($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('admin/news/list')->with('notification', 'Delete success');
    }
}
