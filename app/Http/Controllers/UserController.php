<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\AddCategoriesRequest;
use App\Http\Requests\EditCategoriesRequest;

class UserController extends Controller
{
    public function getList()
    {
        $user = User::all();
        return view('admin.User.list',['user'=>$user]);
    }

    public function getAdd()
    {
        return view('admin.User.add');
    }

    public function postAdd(AddCategoriesRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('admin/User/add')->with('notification','Add Success');
    } 

    public function getEdit($id)
    {

    }

    public function postEdit(EditCategoriesRequest $request,$id)
    {
   
    }

    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/User/list')->with('notification','Delete success');
    }
}