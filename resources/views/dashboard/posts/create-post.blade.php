@extends('layout.layout')
@section('page-header')
    <x-page-header title="Create new Post" />
@endsection

@section('content')
    <div class="card card-primary">


        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" >
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Post description"></textarea>
                     <p>@error('description') @enderror</p>
                </div>
               
                <div class="form-group" >
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
              
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
