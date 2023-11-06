<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.list-users',[
            'users' => $users
        ]);
    }

    public function create(){
        return view('dashboard.users.create-user');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'image' => $request->has('image') ? 'image' : 'nullable',
            'address' => 'required|min:3',
            'phone' => 'required|unique:users,phone',
            'password' => 'required'
        ]);
        $path = asset('user.png');
        if($request->has('image')){
            $path = $request->image->store('public/users');
            $path = str_replace('public','storage',$path);
        }

        $data['image'] = $path;
        User::create($data);
        return redirect(route('admin.users.index'))->with('success','User created Successfully!');
    }

    public function edit($user){
        $user = User::where('id' , $user)->first();
        return view('dashboard.users.edit-user',compact('user'));
    }
}
