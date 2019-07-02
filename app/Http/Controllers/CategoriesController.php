<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;

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

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100|unique:categories,name'
            ],
            [
                'name.unique' => 'Category name is already excist',
                'name.required' => 'You have not entered a category name.',
                'name.min' => 'Category name must have 3->100 characters',
                'name.max' => 'Category name must have 3->100 characeters'
            ]
            );
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

    public function postEdit(Request $request,$id)
    {
        $categories = categories::find($id);
        $this->validate($request,
            [
                'name' => 'required|unique:categories,name|min:3|max:100'
            ],
            [
                'name.required' => 'You not have entered a category name',
                'name.unique' => 'Category name is already excist',
                'name.min' => 'Category name must have 3->100 characeters',
                'name.max' => 'Category name must have 3->100 characeters'
            ]
            );
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