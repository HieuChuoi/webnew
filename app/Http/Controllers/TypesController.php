<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\types;
use  App\Http\Requests\AddTypesRequest;
use App\Http\Requests\EditTypesRequest;

class TypesController extends Controller
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

    public function postAdd(AddTypesRequest $request)
    {   
        $types = new types;
        $types->name = $request->name;
        $types->unsigned_name = changeTitle($request->name);
        $types->idcategories = $request->categories;
        $types->save();
        return redirect('admin/types/add')->with('notification','Add Type Success!');
    } 

    public function getEdit($id)
    {
        $categories = categories::all();
        $types = types::find($id);
        return view('admin.types.edit',['types'=>$types],['categories'=>$categories]);
    }

    public function postEdit(EditTypesRequest $request,$id)
    {
        $types = types::find($id);
        $types->name = $request->name;
        $types->unsigned_name =changeTitle($request->name);
        $types->idcategories = $request->categories;
        $types->save();
        return redirect('admin/types/edit/'.$id)->with('notification','Edit Type Success');
    }

    public function getDelete($id)
    {
        $types = types::find($id);
        $types->delete();
        return redirect('admin/types/list')->with('notification','Delete success');
    }
}