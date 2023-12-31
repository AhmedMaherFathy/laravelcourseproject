<?php

namespace App\Repositories;


interface BaseRepository{
    public function all();
    public function create($data);
    public function update($model,$data);
    public function delete($id);
    public function saveImage($file,$path);
    public function find($id);
}