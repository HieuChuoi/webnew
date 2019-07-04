<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\LoginRequest;

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

    public function postAdd(AddUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('admin/User/add')->with('notification','Add Success');
    } 

    // public function getEdit($id)
    // {

    // }

    // public function postEdit(EditUserRequest $request,$id)
    // {
   
    // }

    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/User/list')->with('notification','Delete success');
    }
    
    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/categories/list');
        }
        else
        {
            return redirect('admin/login')->with('notification','Login Failed');
        }
    }
}