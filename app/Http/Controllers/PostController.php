<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('dashboard.posts.list-posts',[
            'posts' => $posts
        ]);
    }

    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $user = Auth::user();
        if(!$user){
            return abort(403);
        }
       $data =  $request->validate([
            'description' => 'required|max:1255|min:3|string',
            'image' => 'image|required',
        ]);

        $post = Post::create($data);
        if($post){
            session()->flash("message","post created successfully");
            return redirect(route('posts.index'));
        }

        return redirect()->back()->with('error','This post not created');
    }

    public function edit(Post $post){ 
        return view('post-edit',[
            'post' => $post,
        ]);
    }

}
