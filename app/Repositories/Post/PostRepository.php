<?php 

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;

interface PostRepository extends BaseRepository{

    public function adminCreate($data);
    public function adminUpdate($request);
}