<?php 

namespace App\Repositories\Post\Elqouent;

use App\Repositories\BaseElqouentRepository;
use App\Repositories\Post\PostRepository;
use Illuminate\Support\Facades\Auth;

class ElqouentPostRepository extends BaseElqouentRepository implements PostRepository{
   
    public function adminCreate($request){
        $data = $request->all();
        $image = '';
        if($request->has('image')){
            $image  = $request->file("image")->store('public/posts');
        }
        $image = str_replace('public','storage',$image);
        $data['image'] = $image;
        $data['user_id'] = Auth::user()->id;
        unset($data['_token']);
        return $this->create($data);
    }

    public function adminUpdate($request){
        $data = $request->all();
        if(isset($data['image'])){
            $path = $request->image->store('public/posts');
            $path = str_replace('public','storage',$path);
            $data['image'] = $path;
        }
        $post = $this->find($request->id);
        unset($data['id']);
        unset($data['token']);
        return  $post->update($data);
    }
}