<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function getLoginPage(){
        return view('auth.login');
    }


    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect(route('dashboard'))->with("success","Welcome Back!");
        }

        return redirect()->back()->with('fail',"Credintial error");
    }

    public function getRegestrationPage(){
        return view('auth.register');
    }
    public function register(Request $request,$role){
        // validation
        $data = $request->validate([
            'name' => 'required|max:25',
            'image' => 'image|required',
            'email' => 'email|unique:users,email',
            'password' => 'required',
        ]);
        $roles = ['admin','user'];
        if(!in_array($role,$roles))
        {
            abort(400);
        }
        
        $path = $data['image']->store('public/uploads');
        $path = str_replace('public','storage',$path);
        $data['image'] = $path;
        $data['role'] = $role;
        User::create($data);
        return redirect(route('login'))->with('success','Logged in successfully');
    }

    public function profile(){
        $user = Auth::user();
        if($user){
            return view('auth.profile',[
                'user' => $user
            ]);
        }
         abort(403);
    }

    public function logout(){
        Session::flash();
        Auth::logout();
        return redirect('/')->with('success','Logged out successfully!');
    }


}

// remember me 
// forget password
// login with otp 
// update profile 
// password confirmation
// login with google 