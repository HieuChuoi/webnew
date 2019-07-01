<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\types;

class typesController extends Controller
{
    public function getList()
    {
        $types = types::all();
        return view('admin.types.list',['types'=>$types]); 
    }

    public function getAdd()
    {
        $categories = categories::all();
        return view('admin.types.add',['categories'=>$categories]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|unique:types,name|min:3|max:100',
            'categories'=>'required'
        ],
        [
            'name.required'=>'You have not entered Type name',
            'name.unique'=>'Type name is already excist',
            'name.mix'=>'Type name must have 3->100 characters',
            'name.max'=>'Type name must have 3->100 characters',
            'categories.required'=>'You have not choosed Category'
        ]);
        $types = new types;
        $types->name = $request->name;
        $types->unsigned_name = changeTitle($request->name);
        $types->idcategories = $request->categories;
        $types->save();
        return redirect('admin/types/add')->with('notification','Add Type Success!');
    } 

    public function getEdit($id)
    {

    }

    public function postEdit(Request $request,$id)
    {

    }

    public function getDelete($id)
    {
        $types = types::find($id);
        $types->delete();
        return redirect('admin/types/list')->with('notification','Delete success');
    }
}