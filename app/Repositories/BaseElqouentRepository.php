<?php 

namespace App\Repositories;

abstract class BaseElqouentRepository implements BaseRepository{

    
    public function __construct(private $model)
    {
        $this->model = $model;
    }

    public function all(){
        return $this->model->all();
    }

    public function create($data){
        return $this->model->create($data);
    }
    public function update($model,$data){

    }
    public function delete($id){

    }
    public function saveImage($file,$path){

    }

    public function find($id){
        return $this->model->findOrFail($id);
    }
    
}