<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Repositories\Post\PostRepository;

class PostController extends Controller
{
    private $postRepository; 

    public function __construct(PostRepository $postRepository)
    {
        $this->$postRepository  = $postRepository;
    }
    
    public function index(){
        $posts = $this->postRepository->all();
        return view('dashboard.posts.list-posts',[
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create-post');
    }
    
    public function store(StorePostRequest $request)
    {
        $post = $this->postRepository->adminCreate($request);
        if($post){
            return redirect(route('posts.index'))->with("message","post created successfully");
        }
        return redirect()->back()->with('error','This post not created');
    }

    public function edit(Post $post){ 
        return view('dashboard.posts.edit',[
            'post' => $post,
        ]);
    }

    public function delete($id){
        $this->postRepository->delete($id);
        return redirect()->back()->with('delete','item deleted successfully');
    }

    public function update(UpdatePostRequest $request){
        $this->postRepository->adminUpdate($request);
        return redirect(route('posts.index'))->with('edit',"Post Edit Successfully!");
    }

}
