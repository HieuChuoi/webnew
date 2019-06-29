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
        return view('admin.categories.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:3|max:100'
        ],
        [
            'name.required' => 'You have not entered a category name.',
            'name.min' => 'Category name must have 3->100 characters',
            'name.max' => 'Category name must have 3->100 characeters',
        ]);

        $categories = new categories;
        $categories->name = $request->name;
        $categories->unsigned_name = changeTitle($request->name);
        $categories->save();
        return redirect('admin/categories/add')->with('notification','Add Category Success!');
    } 

    public function getEdit()
    {

    }
}
