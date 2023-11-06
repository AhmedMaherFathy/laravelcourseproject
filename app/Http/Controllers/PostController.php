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

    public function create()
    {
        return view('dashboard.posts.create-post');
    }
    
    public function store(Request $request){
       $data =  $request->validate([
            'description' => 'required|max:1255|min:3|string',
            'image' => 'image|required|max:2048',
        ]);

        $image = '';
        if($request->has('image')){
            $image  = $request->file("image")->store('public/posts');
        }
        $image = str_replace('public','storage',$image);
        $data['image'] = $image;
        $data['user_id'] = Auth::user()->id;

        $post = Post::create($data);
  
        if($post){
            session()->flash("message","post created successfully");
            return redirect(route('posts.index'));
        }
        
        return redirect()->back()->with('error','This post not created');
    }

    public function edit(Post $post){ 
        return view('dashboard.posts.edit',[
            'post' => $post,
        ]);
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('delete','item deleted successfully');
    }

    public function update(Request $request){
        $data = $request->validate([
            'description' => 'required',
            'image' => 'nullable',
            'id' => 'required'
        ]);
        if(isset($data['image'])){
            $path = $request->image->store('public/posts');
            $path = str_replace('public','storage',$path);
            $data['image'] = $path;
        }
        $post = Post::find($data['id']);
        unset($data['id']);
        $post->update($data);
        return redirect(route('posts.index'))->with('edit',"Post Edit Successfully!");
    }

}
