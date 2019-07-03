<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\Http\Requests\AddCategoriesRequest;
use App\Http\Requests\EditCategoriesRequest;

class CategoriesController extends Controller
{
    public function getList()
    {
        $categories = categories::all();
        return view('admin.categories.list',['categories'=>$categories]); 
    }

    public function getAdd()
    {
        return view('admin.categories.add');
    }

    public function postAdd(AddCategoriesRequest $request)
    {
        $categories = new categories;
        $categories->name = $request->name;
        $categories->unsigned_name = changeTitle($request->name);
        $categories->save();
        return redirect('admin/categories/add')->with('notification','Add Category Success!');
    } 

    public function getEdit($id)
    {
        $categories = categories::find($id);
        return view ('admin.categories.edit',['categories'=>$categories]);
    }

    public function postEdit(EditCategoriesRequest $request,$id)
    {
        $categories = categories::find($id);
        $categories->name = $request->name;
        $categories->unsigned_name = changeTitle($request->name);
        $categories->save();
        return redirect('admin/categories/edit/'.$id)->with('notification','Edit success');
    }

    public function getDelete($id)
    {
        $categories = categories::find($id);
        $categories->delete();
        return redirect('admin/categories/list')->with('notification','Delete success');
    }
}